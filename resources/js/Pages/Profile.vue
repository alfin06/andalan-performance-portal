<script setup>
import {ref} from 'vue';
import Layout from '../Layouts/Main'

</script>

<template>
    <Layout></Layout>
    <div class="page-wrapper">
        <div class="container-fluid">
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
                                  <!-- <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../assets/images/icon/staff.png" alt="Income" /></div>-->
                                    <div class="align-self-center">
                                       <h6 class="text-muted m-t-10 m-b-0">Start Date: 03/01/2024</h6>
                                       <h2 class="m-t-0">Andrei Kurnia</h2> <h6 class="text-muted m-t-10 m-b-0">Program: 2x a Week | General Population</h6>
                                    </div>
                                </div>
                           </div>
                       </div>
                   </div> 
               </div>


               <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#week1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Week 1</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#week2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Week 2</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#week3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Week 3</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" href="#week3" data-target="#myModalWeek"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down"><i class="ti-plus"></i></span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="week1" role="tabpanel">
                                        <div class="d-flex m-t-20">
                                            <div></div>
                                            <div class="ml-auto">
                                                <button class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal">Add Movement Plan <i class="ti-plus"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex m-t-20">
                                            <div>
                                                <h4 class="card-title"><span class="lstick"></span>Tuesday - 23/01/24</h4>
                                                <h6 class="card-subtitle">Notes: -</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <button class="pull-right btn btn-rounded btn-primary" data-toggle="modal" data-target="#myModalNote">Add Notes <i class="ti-plus"></i></button>
                                            </div>
                                        </div>

                                        
                                        <div class="table-responsive m-t-20">
                                            <table id="table_print" class="display nowrap table table-hover  table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Movement</th>
                                                        <th>Status</th>
                                                        <th>Sets</th>
                                                        <th>T.</th>
                                                        <th>Wt.</th>
                                                        <th>Rest</th>
                                                        <th>Reps Achieved</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Reverse Plank  </td>
                                                        <td><span class="label label-success label-rounded">Good</span></td>
                                                        <td>1</td>
                                                        <td>20</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>60"</td>
                                                        <td class="display:flex;"><button class="btn btn-success btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i> Subs</button>
                                                            <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-pencil"></i> Edit</button>
                                                        </td>
                                                    </tr>
                                                    <tr  data-toggle="collapse" data-target="#sub1" class="accordion-toggle">
                                                        <td><span class="label label-primary">subs</span> Broad Jump Continuous </td>
                                                        <td><span class="label label-success label-rounded">Good</span></td>
                                                        <td>1</td>
                                                        <td>20</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>60"</td>
                                                        <td class="display:flex;">
                                                            <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-pencil"></i> Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="8" class="hiddenRow" style="padding: 0px;">
                                                           <div class="accordian-body collapse" id="sub1"> 
                                                            <table style="width:100%;">
                                                                <thead>
                                                                <tr>
                                                                    <th>Planned Movement</th>
                                                                    <th>Status</th>
                                                                    <th>Sets</th>
                                                                    <th>T.</th>
                                                                    <th>Wt.</th>
                                                                    <th>Rest</th>
                                                                    <th>Reps Achieved</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tr>
                                                                    <td>Barbell Chest Supported Row </td>
                                                                    <td><span class="label label-danger label-rounded">Bad</span></td>
                                                                    <td>1</td>
                                                                    <td>20</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>60"</td>
                                                                    <td class="display:flex;">
                                                                        <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-pencil"></i> Edit</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="label label-primary">subs</span> Cable Half Kneeling Row </td>
                                                        <td><span class="label label-danger label-rounded">Bad</span></td>
                                                        <td>1</td>
                                                        <td>20</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>60"</td>
                                                        <td class="display:flex;">
                                                            <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-pencil"></i> Edit</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><span class="label label-primary">subs</span> Cable Half Kneeling Row </td>
                                                        <td><span class="label label-danger label-rounded">Bad</span></td>
                                                        <td>1</td>
                                                        <td>20</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>60"</td>
                                                        <td class="display:flex;">
                                                            <button class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#myModal"><i class="ti-pencil"></i> Edit</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="tab-pane  p-20" id="week2" role="tabpanel">
                                        <div class="d-flex m-t-20">
                                            <div></div>
                                            <div class="ml-auto">
                                                <button class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal">Add Movement Plan <i class="ti-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-20" id="week3" role="tabpanel">
                                        <div class="d-flex m-t-20">
                                            <div></div>
                                            <div class="ml-auto">
                                                <button class="pull-right btn btn-success" data-toggle="modal" data-target="#myModal">Add Movement Plan <i class="ti-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Movement History</h4>
                                <h6 class="card-subtitle">Click table row to see details</h6>

                                <table class="table table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                                    <th></th>
                                          <th>Movement Name</th>
                                          <th>Total Sets</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                           <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                           <td>Reverse Plank <span class="label label-rounded label-success pull-right">3</span></td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" class="hiddenRow" style="padding: 0px;">
                                                <div class="accordian-body collapse" id="demo1"> 
                                                <table style="width:100%;">
                                                    <thead>
                                                        <tr class="info">
                                                            <th>Week</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Sets</th>		
                                                            <th>T.</th>	
                                                            <th>Wt.</th>	
                                                            <th>Rest</th>	
                                                            <th>Reps Achieved</th>	
                                                        </tr>
                                                    </thead>
                                                    <tr>
                                                        <td>Week 1</td>
                                                        <td>23/01/2024</td>
                                                        <td><span class="label label-success label-rounded">Good</span></td>
                                                        <td>3 </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> 60" </td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Week 2</td>
                                                        <td>23/01/2024</td>
                                                        <td><span class="label label-success label-rounded">Good</span></td>
                                                        <td>3 </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> 60" </td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Week 3</td>
                                                        <td>23/01/2024</td>
                                                        <td><span class="label label-success label-rounded">Good</span></td>
                                                        <td>3 </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> 60" </td>
                                                        <td>-</td>
                                                    </tr>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                      
                                        <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                             <td>FFE Split Squat</td>
                                             <td>5</td>
                                         </tr>

                                         <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                             <td>Assisted Pull Up</td>
                                             <td>3</td>
                                         </tr>
                                            
                                        
                                       
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Activity widget find scss into widget folder-->
                    <!-- ============================================================== -->
                    
                </div>

            test
        </div>
    </div>
</template>

<style>
</style>