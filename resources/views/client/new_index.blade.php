<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Admin Pro Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <!-- <link href="{{ asset('assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet"> -->
    <!--c3 CSS -->
    <link href="{{ asset('assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('css/pages/dashboard2.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    <style>
        .hiddenRow {
            padding: 0 !important;
        }

        .day_container{
            border: 1px solid #e0e0e0;
            padding: 10px;
            border-radius: 20px;
            margin-top: 10px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Pro</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
              
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="../assets/images/users/profile.png" alt="user" /><span class="hide-menu">Steave Jobs </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void()">My Profile </a></li>
                                <li><a href="javascript:void()">Admin Setting</a></li>
                                <li><a href="javascript:void()">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MASTER DATA</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-themecolor pull-right">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="and_home.html">Home </a></li>
                                <li><a href="and_masterclient.html">Movement List</a></li>
                                <li><a href="and_mastermovement.html">Client List</a></li>
                            </ul>
                        </li>
                   
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Stats box -->
                <!-- ============================================================== -->
                <div class="modal fade" id="headModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Date</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="new_date" name="new_date"> </div>
                                    <input type="hidden" id="tab_id" name="tab_id"> <!-- Hidden field for head ID -->
                                    <input type="hidden" id="client_id" name="client_id"> <!-- Hidden field for client ID -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" onclick="addNewDate()"><i class="ti ti-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:1000px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Daily Movement (Week 1)</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-3">
                                    <label>Date</label>
                                    <input type="date" class="form-control" > </div>
                                <form class="row">
                                    <div class="form-group col-4">
                                        <label>Category</label>
                                        <select class="custom-select form-control pull-right">
                                            <option selected="">Pick Category</option>
                                            <option value="1">Hinge</option>
                                            <option value="2">Power</option>
                                            <option value="3">Pull</option>
                                            <option value="4">Push</option>
                                            <option value="5">Cardio</option>
                                            <option value="5">Squat</option>
                                            <option value="6">Hamstring</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Movement Plan</label>
                                        <select class="custom-select form-control pull-right">
                                            <option selected="">Pick Movement</option>
                                            <option value="1">Assisted Pull Up ( 5 sets)</option>
                                            <option value="2">Line Jump | Lateral <span>( 5 sets)</span></option>
                                            <option value="3">Line Jump | Sagital <span>( 0 sets)</span></option>
                                            <option value="4">FEE Split Squat <span>( 0 sets)</span></option>
                                            <option value="5">Reverse Plank <span>( 0 sets)</span></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Status</label>
                                        <select class="custom-select form-control pull-right">
                                            <option selected="">Good</option>
                                            <option value="1">Medium</option>
                                            <option value="2">Bad</option>
                                        </select>
                                    </div>
                                    <div class="col-6" >
                                        <label>Details</label> <br />
                                        <input type="text" class="form-control" placeholder="Sets" style="width:80px;margin-right:10px;">
                                        <input type="text" class="form-control" placeholder="T." style="width:80px;margin-right:10px;">
                                        <input type="text" class="form-control" placeholder="Wt." style="width:80px;margin-right:10px;">
                                        <input type="text" class="form-control" placeholder="Rest" style="width:80px;margin-right:10px;">
                                    </div>
                                    <div class="col-6" >
                                        <label>Reps Achieved</label> <br />
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                        <input type="text" class="form-control"  style="width:60px;margin-right:5px;">
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="myModalWeek" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Tab</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                              
                                <form class="row">
                                    <div class="form-group col-8">
                                        <input type="text" class="form-control" placeholder="Tab Name" > </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="myModalDate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Date</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row">

                    @csrf
                    <div class="form-group col-8">
                        <input type="date" class="form-control" id="head_date" name="head_date" required> <!-- Input field for date -->
                        <input type="hidden" id="head_id" name="head_id"> <!-- Hidden field for head ID -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteDate()" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="updateDate()">Update</button> <!-- Submit button -->
            </div>
        </div>
    </div>
</div>



                <div class="modal fade" id="myModalNote" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Notes </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                              
                                <form class="row">
                                    <div class="form-group col-4">
                                        <h6 class="card-subtitle">Date : 23/03/2024</h6><br />
                                        <textarea name="notes_date23032024" rows="4" cols="50" placeholder="Type Notes Here..."></textarea>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                   
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Start Date: 03/01/2024</h6>
                                        <h2 class="m-t-0">{{ $client->name }}</h2> <h6 class="text-muted m-t-10 m-b-0">Program: 2x a Week | General Population</h6></div>
                                       
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Projects of the month -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        
                    <!-- ============================================================== -->
                    <!-- Content herer-->
                    <!-- ============================================================== -->

                    <div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            @foreach ($tabs as $tab)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab_{{ $tab->id }}" role="tab">
                        <span class="hidden-sm-up">{{ $tab->tab_name }}</span>
                        <span class="hidden-xs-down">{{ $tab->tab_name }}</span>
                    </a>
                </li>
            @endforeach
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="#week3" data-target="#myModalTab">
                    <span class="hidden-sm-up"><i class="ti-plus"></i></span>
                    <span class="hidden-xs-down"><i class="ti-plus"></i></span>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content tabcontent-border">
            @foreach ($tabs as $tab)
                <div class="tab-pane" id="tab_{{ $tab->id }}" role="tabpanel">
                    <button class="btn btn-success btn-rounded dateBtn" id="dateBtn" data-toggle="modal" data-target="#headModal"  onclick="setTabId({{ $tab->client_id }},{{ $tab->id }})">
                        <i class="ti-calendar"></i> Add Date
                    </button>

                    @foreach ($head_training as $h)
                        @if ($h->tab_id == $tab->id)
                            <div class="day_container">
                                <div class="d-flex m-t-20 row">
                                    <div class="col-12">
                                        <h4 class="card-title">
                                            <span id="head-date-{{ $h->id }}">{{ \Carbon\Carbon::parse($h->head_date)->format('l, F d, Y') }}</span>
                                             <button class="btn btn-rounded btn-sm btn-outline-primary" data-toggle="modal" data-target="#myModalDate" 
                                                    onclick="setModalDate('{{ $h->head_date }}', {{ $h->id }})">
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <button class="pull-right btn btn-success btn-rounded btn-sm" id="movementBtn" data-toggle="modal" data-target="#movementModal">
                                                <i class="ti-plus"></i> Add Movement
                                            </button>
                                        </h4>
                                        <h6 class="card-subtitle">
                                            Notes: {{ $h->head_notes }}
                                            <button class="btn btn-rounded btn-sm btn-outline-primary" id="noteButton">
                                                <i class="ti-pencil"></i>
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-20">
                                    <table id="table_print" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Block</th>
                                                <th>Planned Movement</th>
                                                <th>Status</th>
                                                <th>Sets</th>
                                                <th>Reps</th>
                                                <th>T.</th>
                                                <th>Wt.</th>
                                                <th>Rest</th>
                                                <th colspan="6">Reps Achieved</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $prevBlock = null; @endphp
                                            @foreach ($data as $x)
                                                @if ($x->tab_id == $tab->id && $x->head_training_id == $h->id)
                                                    @if ($prevBlock && $prevBlock !== substr($x->block, 0, 1))
                                                        <tr>
                                                            <td colspan="100%" style="height: 20px; padding: 0;">&nbsp;</td>
                                                        </tr>
                                                    @endif
                                                    @php $prevBlock = substr($x->block, 0, 1); @endphp

                                                    <tr data-toggle="collapse" data-target="#sub{{ $loop->index }}" class="accordion-toggle">
                                                        <td>{{ $x->block }}</td>
                                                        <td>
                                                            @if ($x->subs == 'Y')
                                                            <span class="label label-primary">subs</span>
                                                            @endif
                                                            {{ $x->movement_name }}
                                                        </td>
                                                        <td>
                                                            @if ($x->status == 'Struggling')
                                                                <span class="label label-warning label-rounded">{{ $x->status }}</span>
                                                            @elseif ($x->status == 'Fail')
                                                                <span class="label label-danger label-rounded">{{ $x->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $x->sets }}</td>
                                                        <td>{{ $x->reps }}</td>
                                                        <td>{{ $x->t }}</td>
                                                        <td>{{ $x->wt }}</td>
                                                        <td>{{ $x->rest }}</td>
                                                        <td>{{ $x->reps1 }}</td>
                                                        <td>{{ $x->reps2 }}</td>
                                                        <td>{{ $x->reps3 }}</td>
                                                        <td>{{ $x->reps4 }}</td>
                                                        <td>{{ $x->reps5 }}</td>
                                                        <td>{{ $x->reps6 }}</td>
                                                        <td>
                                                            @if ($x->subs != 'Y')
                                                                <button class="btn btn-warning btn-sm btn-rounded">Struggling</button>
                                                                <button class="btn btn-danger btn-sm btn-rounded">Fail</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if ($x->subs == 'Y')
                                                        <tr class="accordian-body collapse {{ $x->sub_status === 'Struggling' ? 'struggle' : 'fail' }}" id="sub{{ $loop->index }}">
                                                            <td>{{ $x->sub_block }}</td>
                                                            <td>{{ $x->sub_mov_name }}</td>
                                                            <td>
                                                                <span class="label label-rounded {{ $x->sub_status === 'Struggling' ? 'label-warning' : 'label-danger' }}">
                                                                    {{ $x->sub_status }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $x->sub_sets }}</td>
                                                            <td>{{ $x->sub_reps }}</td>
                                                            <td>{{ $x->sub_t }}</td>
                                                            <td>{{ $x->sub_wt }}</td>
                                                            <td>{{ $x->sub_rest }}</td>
                                                            <td>{{ $x->sub_reps1 }}</td>
                                                            <td>{{ $x->sub_reps2 }}</td>
                                                            <td>{{ $x->sub_reps3 }}</td>
                                                            <td>{{ $x->sub_reps4 }}</td>
                                                            <td>{{ $x->sub_reps5 }}</td>
                                                            <td>{{ $x->sub_reps6 }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

                      <!-- ============================================================== -->
                    <!-- Content here-->
                    <!-- ============================================================== -->

                    </div>
                  
                    
                </div>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2017 Admin Pro by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    <!-- <script src="{{ asset('assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script> -->
    <!--c3 JavaScript -->
    <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/dashboard2.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
        <!-- This is data table -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
       <!-- start - This is for export functionality only -->
       <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
       <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
       <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script>
       
     
    $('#table_print').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });

    function setTabId(client_id, tab_id){
        const idInputTab = document.querySelector('#headModal input[name="tab_id"]');
        const idClient = document.querySelector('#headModal input[name="client_id"]');
        idInputTab.value = tab_id;
        idClient.value = client_id;

    }

    function setModalDate(headDate, headId) {
        const dateInput = document.querySelector('#myModalDate input[name="head_date"]');
        const idInput = document.querySelector('#myModalDate input[name="head_id"]');

        // Set the input values in the modal
        dateInput.value = headDate; // Set the date input value
        idInput.value = headId; // Set the hidden input value for ID

    }

    function addNewDate() {
    const tab_id = document.getElementById('tab_id').value;
    const newDate = document.getElementById('new_date').value;
    const client_id = document.getElementById('client_id').value;

    // Log the values (for debugging purposes)
    console.log('Date:', newDate, 'tab ID:', tab_id, 'client:', client_id);

    // Send AJAX request to the 'training.addNewDate' route
    fetch("{{ route('training.addNewDate') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            date: newDate,
            tab_id: tab_id,
            client_id: client_id
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert('Date added successfully');
         // Close the modal
         $('#headModal').modal('hide');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to add head training');
    });
}



    function updateDate() {
    //Get the values of the input fields
    const headDate = document.getElementById('head_date').value;
    const headId = document.getElementById('head_id').value;

   // Log the values (for debugging purposes)
   console.log('Date:', headDate, 'Head ID:', headId);
    // Perform an AJAX request to update the date
        fetch("{{ route('training.updateDate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                head_date: headDate,
                head_id: headId
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle success
            alert('Date updated successfully!');
            console.log(data);

            // Update the UI dynamically
            document.querySelector(`#head-date-${headId}`).innerText = new Date(headDate).toLocaleDateString('en-US', {
                        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                    });

            // Close the modal
            $('#myModalDate').modal('hide');
        })
        .catch(error => {
            // Handle error
            console.error('Error updating date:', error);
            alert('Failed to update the date. Please try again.');
        });
    }


    function deleteDate() {
    // Show a confirmation dialog
    const userConfirmed = confirm("Are you sure to delete the date and all of its content?");
    
    if (userConfirmed) {
        // Get the `head_id` value from the hidden input field
        const headId = document.getElementById('head_id').value;
        // Perform an AJAX request to delete the date
        fetch("{{ route('training.deleteDate') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                head_id: headId // Send the `head_id` to the server
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            if (data.success) {
                alert("Date and its content deleted successfully!");
                location.reload(); // Reload the page to reflect changes
            } else {
                alert("Failed to delete the date. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error deleting date:", error);
            alert("An error occurred while deleting the date.");
        });
    }
}
    </script>
</body>

</html>