<x-organiser-layout>
    <x-slot name="title">Organiser - Dashboard</x-slot>

    <x-slot name='main'>

    <main class="dash-content">
        <div class="container-fluid">
            <!-- <h1 class="dash-title">Organiser Dashboard</h1> -->
            <div class="row">
                <a href="{{ route('organiser.events.index') }}">
                <div class="col-lg-4">

                    <div class="stats stats-success">

                        <h3 class="stats-title"> Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">  {{ $event_Count }}  </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('organiser.events.index') }}">
                    <div class="stats stats-secondary">
                        <h3 class="stats-title"> Active Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">   {{ $active_event }} </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{ route('organiser.events.index') }}">
                    <div class="stats stats-primary">
                        <h3 class="stats-title"> Completed Events </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">  {{ $inactive_event }}  </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-lg-4">
                    <a href="{{ route('organiser.payments.index') }}">
                    <div class="stats stats-info">
                        <h3 class="stats-title"> Tickets </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number"> {{ $avalible_ticket }}  </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('organiser.payments.index') }}">
                    <div class="stats stats-warning">
                        <h3 class="stats-title"> Amount </h3>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">  {{ $total_amount }} </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
                </div>
            </div>
        </div>
    </main>

    </x-slot>
</x-organiser-layout>
