@extends('admin/main')

@section('title', 'Главная')

@section('content')


        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>$6k</h1>
                        <span>income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Последние заказы</h3>
                            <button>
                                 Смотреть все
                                <span class="las la-arrow-right"></span>
                            </button>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td>Дата заказа</td>
                                        <td>Статус заказа</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="">12456</a></td>
                                        <td>10.10.10</td>
                                        <td class="td-status">
                                            <span class="status purple"></span>
                                            новый
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td  class="td-status">
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td class="td-status">
                                            <span class="status orange"></span>
                                            pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td class="td-status">
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td class="td-status">
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td class="td-status">
                                            <span class="status orange">
                                            </span>
                                            pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td class="td-status">
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td class="td-status">
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td class="td-status">
                                            <span class="status orange"></span>
                                            pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td>
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td>
                                            <span class="status orange">
                                            </span>
                                            pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td>
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td>
                                            <span class="status orange"></span>
                                            pending
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UI/UX Design</td>
                                        <td>UI Team</td>
                                        <td>
                                            <span class="status purple"></span>
                                            review
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Web Dev</td>
                                        <td>Frontend</td>
                                        <td>
                                            <span class="status pink"></span>
                                            in progress
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ushp app</td>
                                        <td>Mobile Team</td>
                                        <td>
                                            <span class="status orange">
                                            </span>
                                            pending
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New customers</h3>
                            <button>
                                See all
                                <span class="las la-arrow-right"></span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="./img/pileje/logo.png" alt="" width="30px" height="30px">
                                    <div>
                                        <h4>Lewies S Cunningham</h4>
                                        <small>Ceo excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                -->
            </div>


        </main>

@endsection