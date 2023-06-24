<x-admin-layout>
    <x-slot name="title">Admin - Dashboard</x-slot>

    <x-slot name='main'>

    <main class="dash-content">
        <div class="container-fluid">
            <!-- <h1 class="dash-title">Admin Dashboard</h1> -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="stats stats-primary">
                        <a href="{{ route('admin.users.index') }}" style="color:white">
                        <h3 class="stats-title"> Users </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">     {{ $total_users }}  </div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-secondary">
                        <a href="{{ route('admin.organiser.index') }}" style="color:white">
                        <h3 class="stats-title"> Organisers </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $total_organiser }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-success">
                    <a href="{{ route('admin.events.index') }}" style="color:white">
                        <h3 class="stats-title"> Events </h3>
                    </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $total_event }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-info">
                        <a href="{{ route('admin.payments') }}" style="color:white">
                        <h3 class="stats-title"> Tickets </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $total_ticket }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-warning">
                        <a href="{{ route('admin.payments') }}" style="color:white">
                        <h3 class="stats-title"> Amount </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $total_amount }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-dark">
                        <a href="{{ route('admin.events.index') }}" style="color:white">
                        <h3 class="stats-title"> Active Events </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $active_events }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="stats stats-danger">
                        <a href="{{ route('admin.events.index') }}" style="color:white">
                        <h3 class="stats-title"> Completed Events </h3>
                        </a>
                        <div class="stats-content">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stats-data">
                                <div class="stats-number">{{ $inactive_events }}</div>
                                <div class="stats-change">
                                    <span class="stats-percentage">+17.5%</span>
                                    <span class="stats-timeframe">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    </div>
    </x-slot>
</x-admin-layout>
