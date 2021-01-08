<?php
$this->load->view('inc/header');

    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
        .alrtMsg {
            padding-top: 50px;
        }
        
        .alrtMsg i {
            font-size: 60px;
            color: #f1c836;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>

    <?php
    die;
     }
    ?>

        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css">

        <body class="theme-light" onload="myFunction()" style="margin:0;" data-highlight="blue2">
            <div id="loader"></div>
            <div id="page">
                <?php
                    $this->load->view('inc/fixed_header');
                ?>
                    <?php
                      $this->load->view('inc/footer');
                  ?>
                         <!-- Profile -->
                              <?php
                                $this->load->view('profile');

                            ?>
                            <div class="page-content">
                                <?php
                                      $this->load->view('inc/collapsable_header');
                                    ?>
                                    <div class="clearfix"></div>
                                    <style>
                                        @media screen and (min-width: 768px) {
                                            modal_ .modal-dialog {
                                                width: 900px;
                                            }
                                        }
                                        
                                        .form-group input[type="checkbox"] {
                                            display: none;
                                        }
                                        
                                        .form-group input[type="checkbox"] + .btn-group > label span {
                                            width: 20px;
                                        }
                                        
                                        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
                                            display: none;
                                        }
                                        
                                        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
                                            display: inline-block;
                                        }
                                        
                                        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
                                            display: inline-block;
                                        }
                                        
                                        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
                                            display: none;
                                        }
                                        
                                        tr.highlight_past td.due_date {
                                            background-color: #cc6666 !important;
                                        }
                                        
                                        tr.highlight_now td.due_date {
                                            background-color: #e4b13e !important;
                                        }
                                        
                                        tr.highlight_future td.due_date {
                                            background-color: #65dc68 !important;
                                        }
                                        
                                        #history_table td {
                                            border: 1px solid #aaa;
                                            padding: 5px
                                        }
                                        /* td, th {
                                            padding: 0;
                                            padding: 9px 18px;
                                        } */
                                    </style>

                                    <div class="divider divider-margins"></div>

                                    <div class="content">

                                        <div class="content-title has-border border-highlight bottom-18">
                                            <label><?php echo $heading; ?></label>
                                        </div>
     </div>
    <form  action="<?php echo base_url()?>generate_callback" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="emp_code">Dept:</label>
                <select  class="form-control"  id="dept" name="dept" required >
                    <option value="">Select</option>
                    <?php $all_department=$this->common_model->all_active_departments();
                    foreach($all_department as $department){ ?>
                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                    <?php }?>           
                </select>
            </div>

            <div class="col-sm-3 form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
            </div>

            <div class="col-sm-3 form-group">
                <label for="contact_no1">Contact No:</label>
                <input type="number" class="form-control" id="contact_no1" name="contact_no1" placeholder="Contact No">
            </div>

            <div class="col-sm-3 form-group">
                <label for="name">Contact No 2:</label>
                <input type="number" class="form-control" id="contact_no2" name="contact_no2" placeholder="Contact No">
            </div>
            
            <div class="col-md-3 form-group">
                <label for="assign">Call back type:</label>
                <select  class="form-control"  id="callback_type" name="callback_type" required="required" >
                    <option value="">Select </option>
                    <?php $all_callback_types=$this->common_model->all_active_callback_types();
                    foreach($all_callback_types as $callback_type){ ?>
                        <option value="<?php echo $callback_type->id; ?>"><?php echo $callback_type->name; ?></option>
                    <?php }?>            
                </select>
            </div>

            <div class="col-sm-3 form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email1" name="email1" placeholder="Email">
            </div>

            <div class="col-sm-3 form-group">
                <label for="email">Email2:</label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="email">
            </div>

            <div class="col-md-3 form-group">
                <label for="emp_code">Project:</label>
                <select  class="form-control"  id="project" name="project" required="required" >
                    <option value="">Select</option>
                    <?php $projects= $this->common_model->all_active_projects(); 
                    foreach( $projects as $project){ ?>
                        <option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
                    <?php }?>               
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label for="assign">Lead Source:</label>
                <select  class="form-control"  id="lead_source" name="lead_source" required="required" >
                    <option value="">Select</option>
                    <?php $lead_source= $this->common_model->all_active_lead_sources(); 
                    foreach( $lead_source as $source){ ?>
                        <option value="<?php echo $source->id ?>"><?php echo $source->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="abc" hidden>
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label for="ref_by">Refered By:</label>
                            <select  class="form-control"  id="ref_by"  name="ref_by" >
                                    <option value="">Select</option>  
                                    <option value="1">Client</option>
                                    <option value="2">Management</option> 
                            </select>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 form-group">
                            <label for="mob_num">Mobile Number:</label>
                             <input class="form-control" type="text" name="mob_num" id="mob_num" value="">
                        </div>
            </div>

            <!-- <div class="col-sm-3 form-group">
                <label for="leadId">Lead Id:</label>
                <input type="text" class="form-control" id="leadId" name="leadId" placeholder="Lead Id">
            </div> -->

            <div class="col-md-3 form-group">
                <label for="assign">User Name:</label>
                <select  class="form-control"  id="user_name" name="user_name" required="required" >
                     <option value="">Select</option>
                    <?php $all_user= $this->user_model->all_users("type in (1,2,3,4)"); 
                    foreach( $all_user as $user){ 
                        switch ($user->type) {
                            case '1':
                                $role = "User";
                                break;

                            case '2':
                                $role = "Manager";
                                break;

                            case '3':
                                $role = "VP";
                                break;
                            
                            case '4':
                                $role = "Director";
                                break;
                        }
                        ?>
                        <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                    <?php } ?>               
                </select>
            </div>
      
            <div class="col-md-3 form-group">
                <label for="assign">Manage Sub Broker:</label>
                <select  class="form-control"  id="sub_broker" name="sub_broker" required="required" >
                    <option value="">Select</option>
                    <?php $brokers= $this->common_model->all_active_brokers(); 
                    foreach( $brokers as $broker){ ?>
                        <option value="<?php echo $broker->id; ?>"><?php echo $broker->name ?></option>
                    <?php } ?>               
                </select>
            </div>
      
            <div class="col-md-3 form-group">
                <label for="assign">Status:</label>
                <select  class="form-control"  id="status" name="status" required="required" >
                    <option value="">Select</option>
                    <?php $statuses= $this->common_model->all_active_statuses(); 
                    foreach( $statuses as $status){ ?>
                        <option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-sm-3 form-group">
                <label for="Duedate">Due date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Date" required="required">
            </div>
            <div class="col-sm-12" id="leadid_error" style="display:none">
                <div class="alert alert-danger" >
                    The Lead Id already used
                </div>
            </div>
      
            <div class="col-sm-6 form-group">
                <label for="comment">Notes:</label>
                <textarea class="form-control" name="notes" id="notes" rows="3" id="comment"></textarea>
            </div>
      
            <div class="col-sm-12" id="phone_error" style="display:none">
                <div class="alert alert-danger" >
                    The contact number already used
                </div>
            </div>
            
            <div class="col-sm-12" id="email_error" style="display:none">
                <div class="alert alert-danger" >
                    The email already used
                </div>
            </div>
            
            <div class="col-sm-6 form-group">
                <a class="btn btn-danger btn-block" onclick="reset_data()">Cancel</a>
            </div>
            <div class="col-sm-6 form-group">
                <button type="submit" id="save" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
    </form>
                                    </div>
                           
                            </div>
                            <div style="margin-bottom: 60px"></div>

                            <div class="menu-hider"></div>
            </div>
        <div class="modal fade" id="myModalcall" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Call Now</h4>
                    </div>
                    <div class="modal-body">
                        
                        <table>
                            <tr>
                                <th>Customer</th>
                                <th>Number</th>
                            </tr>
                            <tr>
                                <td id="customertdname">abc</td>
                                <td class="customertdphone"><a class="custPhoneancor" href=""><i class="fas fa-phone color-green1-dark"></i></a></td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Notes</h4>
                </div>

                    <div class="modal-body">
                      
                        <table>
                            <tr>
                                <th>Read Previos Note</th>
                                <th class="hidden">id</th>
                                <th>Add Notes</th>
                            </tr>
                            
                            <tr>
                                <td>
                                    <textarea class="form-control" name="notes" rows="5" cols="30" id="previousNotesTxtArea" readonly></textarea>
                                </td>
                                <td class="hidden">
                                    <div id="c_id"></div>
                                </td>
                                <td>
                                    <button style="cursor:pointer" onclick="getmodeltablevalue(this)" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal">
                                        <i class="fas fa-plus-circle "></i>
                                    </button>
                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>
        </div>
        <div class="modal fade" id="addnotes" role="dialog">
            <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 20px; margin-bottom:50px;" >

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add Notes</h4>
                </div>

                    <div class="modal-body">
                      
                      <form method="post" action="<?=base_url('update_callback_details');?>" name="callback_details" autocomplete="off">
                          <div id="callback_data"></div>
                         
                        </form>

                    </div>

                </div>

            </div>
        </div>
\