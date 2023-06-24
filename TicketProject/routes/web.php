<?php
        //OMyjQXCtjL
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrganiserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AdminDetailsController;
use App\http\Controllers\Organiser\Auth\AuthenticatedSessionController as organiser1;
use App\Http\Controllers\Organiser\HomeController as organiserdashboard;
use App\Http\Requests\Auth\OrganiserLoginRequest;
use App\http\Controllers\Organiser\Auth\RegisterOrganiserController;
use App\Http\Controllers\Organiser\HomepageController;
use App\Http\Controllers\Organiser\EventController as event_org;
use App\Http\Controllers\Organiser\OrganiserdetailsController as organiserdetail;
use App\Http\Controllers\Organiser\PaymentController as payment;
use App\Http\Controllers\Organiser\SpeakerController as speaker;
use App\Http\Controllers\home\DatafatchController;
use App\http\Controllers\MaincallingController;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;
use App\http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[MaincallingController::class,'index'])->name('dashboard1');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//start header route ***************************************************************

Route::get('/events',function(){

        $events=Event::get();
        return view('homepage.events',compact('events'));

}) ->name('explore_event');

Route::get('/category',function()  // Explore category call file call route
{
    $categorys=Category::get();
    return view('homepage.category',compact('categorys'));

})->name('category');

Route::get('/contact',function()  // Contact call file call route
{
    return view('homepage.contact');
})->name('contact');

//end header route **********************************************************************

Route::get('/event/{id}',function($id)  // Contact call file call route
{
    $event = Event::find($id);

    $speaker=Event::with('speaker')->findOrFail($id);

    return view('homepage.event',compact('event','speaker'));

})->name('event');


Route::get('/category/{name}',function($name)
{
    $category_name=$name;
    $catevnt = DB::table('events')
    ->where('category', $name)
    ->get();

    // dd($category_event);

    return view('homepage.catevent',compact('catevnt','category_name'));
})->name('category_find');

Route::get('/myticket/{user_id}',[MaincallingController::class,'user_ticket'])->name('ticket_view')->middleware('auth');

    // $user_id=Auth::id();
    // dd($user_id);
    // $payments = Payment::where('user_id', $user_id)->get();
    // $event_id=payment::($user_id);
    // dd($payments);

    // return view('homepage.ticket');


Route::POST('/myticket/{id}',function(Request $request , $id)
{
    $event=Event::find($id);

    $data = $request->all();
    $rand_id = rand(10,500);

    return view('homepage.extraticketview',compact('event','data','rand_id'));
})->name('ticket_send')->middleware('auth');


//payment Route STRIPE

Route::get('/checkout/{id}', [StripePaymentController::class, 'showCheckoutForm'])->name('checkout');
Route::post('/processpayment', [StripePaymentController::class, 'processPayment'])->name('process_payment');

//End Stripe END







Route::middleware('auth',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




//admin route

Route::prefix('admin')->name('admin.')->group(function()
{
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        //login route,,,
        Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
    });
    Route::middleware('admin')->group(function()
    {
        Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');

        //admin resource route,,,

        Route::resource('users', UserController::class);
        Route::resource('speaker', SpeakerController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('organiser', OrganiserController::class);
        Route::resource('events', EventController::class);

        Route::get('payments',[PaymentController::class,'index'])->name('payments');
        Route::get('profile',[AdminDetailsController::class,'index'])->name('profile');
        Route::post('profile/update',[AdminDetailsController::class,'update'])->name('profile.update');
        // Route::post('allow',[OrganiserController::class,'update'])->name('organiser.update');


    });
    Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

});




//organiser Route


Route::prefix('organiser')->name('organiser.')->group(function(){
    Route::namespace('Auth')->middleware('guest:organiser')->group(function(){
        Route::get('login',[organiser1::class,'create'])->name('login');
        Route::post('login',[organiser1::class,'store'])->name('organiserlogin');

        Route::get('register', [RegisterOrganiserController::class, 'create'])->name('register');

        Route::post('register', [RegisterOrganiserController::class, 'store'])->name('register1');

    });
    Route::middleware('organiser')->group(function(){


        Route::resource('speaker', speaker::class);
        Route::resource('organiserdetails', organiserdetail::class);
        Route::resource('events', event_org::class);
        Route::resource('payments', payment::class);


        Route::get('dashboard',[organiserdashboard::class,'index'])->name('dashboard');
    });

    Route::post('logout',[organiser1::class,'destroy'])->name('logout');

});
