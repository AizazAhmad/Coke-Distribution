
<nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                       
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $base_url; ?>" >
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text"><?=$_SESSION['RoleTitle']?> Dashboard</span>
                            </a>                            
                        </li>
                        <?php if ($_SESSION['RoleTitle'] == "Admin") {
                            
                        ?>
                        
                         <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#contacts">
                                <span class="iconz"><i class="fad fa-id-card hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Contacts</span>
                            </a>
                            <ul id="contacts" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-party.php">
                                        <span class="iconz"><i class="fad fa-industry hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Supply Parties</span>
                                    </a> 
                                </li>

                                <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-customer.php">
                                        <span class="iconz"><i class="fad fa-user-tie hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Customers</span>
                                    </a> 
                                </li>
                                                                                                 
                                                         
                                </ul>
                            </ul>                            
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#product">
                                <span class="iconz"><i class="fas fa-wine-bottle hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Products</span>
                            </a>
                            <ul id="product" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-packagesize.php">
                                        <span class="iconz"><i class="fad fa-hand-receiving hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Package Size</span>
                                    </a>  
                                </li>

                                <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-product.php">
                                        <span class="iconz"><i class="fas fa-wine-bottle hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Product</span>
                                    </a>
                                </li>

                                 <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-sub-product.php">
                                        <span class="iconz"><i class="fad fa-wine-bottle hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">SubProduct</span>
                                    </a>
                                </li>
                                
                                                         
                                </ul>
                            </ul>                            
                        </li> 

                       

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#accounts">
                                <span class="iconz"><i class="fad fa-file-invoice-dollar hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Payment Accounts</span>
                            </a>
                            <ul id="accounts" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                <li class="nav-item">
                                    <a class="nav-link" href="list-accounts.php" >
                                        <span class="iconz"><i class="fad fa-usd-circle hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">List Accounts</span>
                                    </a>                            
                                </li>                                                                                 
                                                         
                                </ul>
                            </ul>                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#primary">
                                <span class="iconz"><i class="fad fa-cart-plus hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Primary Sales</span>
                            </a>
                            <ul id="primary" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-primarysales.php">
                                        <span class="iconz"><i class="fad fa-list-ol fa-lg "></i></span>
                                        <span class="nav-link-text">Primary-Sales</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="list-primary-empty-return.php">
                                        <span class="iconz"><i class="fad fa-list-ol fa-lg "></i></span>
                                        <span class="nav-link-text">Empty Return</span>
                                    </a>
                                </li>
                                                            
                            </ul>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#bmang">
                                <span class="iconz"><i class="fad fa-money-check-edit hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Booking Management</span>
                            </a>
                            <ul id="bmang" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="report-booker.php">
                                        <span class="iconz"><i class="fad fa-truck-loading hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Booking Orders</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-booker.php">
                                        <span class="iconz"><i class="fad fa-user-tie hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Add Bookers</span>
                                    </a> 
                                </li>
                                <!-- <li class="nav-item">                                    
                                    <a class="nav-link" href="view-list-rootassign.php">
                                        <span class="iconz"><i class="fad fa-road hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Booker Routing</span>
                                    </a> 
                                </li> -->
                                
                                                            
                            </ul>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#secondary">
                                <span class="iconz"><i class="fad fa-shopping-cart hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Secondary Sales</span>
                            </a>
                            <ul id="secondary" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="list-loading.php">
                                        <span class="iconz"><i class="fad fa-truck-loading hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Loading</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="add-secondary-sales.php">
                                        <span class="iconz"><i class="fad fa-cart-plus fa-lg "></i></span>
                                        <span class="nav-link-text">Add Secondary-Sales</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-sales.php">
                                        <span class="iconz"><i class="fad fa-list-ol fa-lg "></i></span>
                                        <span class="nav-link-text">Secondary-Sales List</span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="add-secondary-sale-return.php">
                                        <span class="iconz"><i class="fad fa-cart-plus fa-lg "></i></span>
                                        <span class="nav-link-text">Seconday Empty Return</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="list-emptyreturnlog.php">
                                        <span class="iconz"><i class="fad fa-cart-plus fa-lg "></i></span>
                                        <span class="nav-link-text">Sec Empty Return List</span>
                                    </a>
                                </li>  --> 
                                                           
                            </ul>
                            </ul>
                        </li>
                                            
                        
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#stock">
                                <span class="iconz"><i class="fad fa-abacus hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Stock</span>
                            </a>
                            <ul id="stock" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="list-stock.php">
                                        <span class="iconz"><i class="fad fa-cart-plus fa-lg "></i></span>
                                        <span class="nav-link-text">Stock List</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="add-empty-loss.php">
                                        <span class="iconz"><i class="fad fa-fragile fa-lg "></i></span>
                                        <span class="nav-link-text">Empty Loss</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="list-objectprice.php">
                                        <span class="iconz"><i class="fad fa-list fa-lg "></i></span>
                                        <span class="nav-link-text">BSP Prices</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="add-emptypurchase.php">
                                        <span class="iconz"><i class="fad fa-cart-plus fa-lg "></i></span>
                                        <span class="nav-link-text">Empty Purchase</span>
                                    </a>
                                </li>
                                
                               
                            </ul>
                            </ul>
                        </li>                        
                        
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#define">
                                <span class="iconz"><i class="fad fa-layer-plus hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Define</span>
                            </a>
                            <ul id="define" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-outlettype.php">
                                        <span class="iconz"><i class="fad fa-home-lg hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Outlet Type</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-vpo.php">
                                        <span class="iconz"><i class="fad fa-award hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">VPO</span>
                                    </a>                            
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-cooler.php">
                                        <span class="iconz"><i class="fad fa-refrigerator hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Coolers</span>
                                    </a>                            
                                </li>                                
                                                               
                            </ul>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Routing">
                                <span class="iconz"><i class="fad fa-route hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Routing</span>
                            </a>
                            <ul id="Routing" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                    
                                <li class="nav-item">
                                    <a class="nav-link" href="list-root.php">
                                        <span class="iconz"><i class="fad fa-lasso hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Add Route</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="list-subroot.php">
                                        <span class="iconz"><i class="fad fa-lasso hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Add SubRoute</span>
                                    </a>                            
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="view-list-rootcustomer.php">
                                        <span class="iconz"><i class="fad fa-list-ol fa-lg "></i></span>
                                        <span class="nav-link-text">Route Criteria</span>
                                    </a>
                                </li> -->
                               
                                                              
                                                               
                            </ul>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Vehiclep">
                                <span class="iconz"><i class="fad fa-truck-moving hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Vehicle</span>
                            </a>
                            <ul id="Vehiclep" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">    

                                <li class="nav-item">
                                    <a class="nav-link" href="add-vehicle.php">
                                        <span class="iconz"><i class="fad fa-plus hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Add Vehicle</span>
                                    </a>                            
                                </li>                                
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-vehicle.php">
                                        <span class="iconz"><i class="fad fa-truck-moving hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">List Vehicle</span>
                                    </a>                            
                                </li>                                
                                                               
                            </ul>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#party">
                                <span class="iconz"><i class="fad fa-users-medical hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Employees</span>
                            </a>
                            <ul id="party" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-emprole.php">
                                        <span class="iconz"><i class="fad fa-user-tag hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Employee Role</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="add-deliveryman.php">
                                        <span class="iconz"><i class="fad fa-user-plus hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Add Employee</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view-list-deliveryman.php">
                                        <span class="iconz"><i class="fad fa-list-ol fa-lg "></i></span>
                                        <span class="nav-link-text">Employee List</span>
                                    </a>
                                </li>
                                
                                
                                </ul>  
                            </ul>
                        </li>
                        
                      <!--   <li class="nav-item">
                            <a class="nav-link" href="list-customer.php">
                                <span class="iconz"><i class="fad fa-user-tie hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Customers</span>
                            </a>                            
                        </li> -->
                                               
                        
                        
                       

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#expenses">
                                <span class="iconz"><i class="fad fa-hand-holding-usd hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Expenses</span>
                            </a>
                            <ul id="expenses" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">                                
                               
                                 <li class="nav-item">
                                    <a class="nav-link" href="list-expense.php">
                                        <span class="iconz"><i class="fad fa-synagogue hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Dist Expense</span>
                                    </a>                            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="list-vehexpense.php">
                                        <span class="iconz"><i class="fad fa-truck-moving hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Vehicle Expense</span>
                                    </a>                            
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="list-empexpense.php">
                                        <span class="iconz"><i class="fad fa-users-class hvr-icon fa-lg"></i></span>
                                        <span class="nav-link-text">Employee Salary/Exp</span>
                                    </a>                            
                                </li>
                                
                                </ul>  
                            </ul>
                        </li>
                        
                        
                        
                         
                       
                        <!-- Bann list -->
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#ban">
                                <span class="iconz"><i class="fad fa-ban hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Ban Section</span>
                            </a>
                            <ul id="ban" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-product.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Product</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-sub-product.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Sub-Product</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-party.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Party</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-deliveryman.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Delivery Man</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-customer.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Customer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-booker.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Bookers</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-ledger.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Ledger</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-outlettype.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban OutletType</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-vpo.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban VPO</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-vehicle.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg "></i></span>
                                        <span class="nav-link-text">Banned Vehicle</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-packagesize.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Package Size</span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-expmaintype.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Main Exp</span>
                                    </a>
                                </li>  
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-expsubtype.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Sub Exp</span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-expchildtype.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Child Exp</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-emprole.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Emp Role</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="ban-list-vehexpmaintype.php">
                                        <span class="iconz"><i class="fad fa-ban fa-lg"></i></span>
                                        <span class="nav-link-text">Ban Veh MType</span>
                                    </a>
                                </li>
                                      
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Ban List End -->
                        <li class="nav-item">
                            <a class="nav-link" href="import.php">
                                <span class="iconz"><i class="fad fa-inbox-in hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Import CSV</span>
                            </a>                            
                        </li>
                      
                         <?php } ?>
                         <?php if ($_SESSION['RoleTitle'] == "Dvo" || $_SESSION['RoleTitle'] == "Admin") {
                           
                         ?>
                      
                        <?php } ?>
                        <?php if ($_SESSION['RoleTitle'] == "Admin") {
                           
                         ?>
                         <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#report">
                                <span class="iconz"><i class="fad fa-file-chart-line hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Reports</span>
                            </a>
                            <ul id="report" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report.php">
                                        <span class="iconz"><i class="fad fa-analytics fa-lg"></i></span>
                                        <span class="nav-link-text">Final Satlement Sheet</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-customer.php">
                                        <span class="iconz"><i class="fad fa-file-chart-line fa-lg"></i></span>
                                        <span class="nav-link-text">Customer FSS Report</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-primarysale.php">
                                        <span class="iconz"><i class="fad fa-file-chart-line fa-lg"></i></span>
                                        <span class="nav-link-text">Primary Sale Report</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-extrashare.php">
                                        <span class="iconz"><i class="fad fa-chart-pie-alt fa-lg"></i></span>
                                        <span class="nav-link-text">ExtraShare Report</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-promo.php">
                                        <span class="iconz"><i class="fad fa-chart-area fa-lg"></i></span>
                                        <span class="nav-link-text">Promo Report</span>
                                    </a>
                                </li>
                                 <li class="nav-item">                                    
                                    <a class="nav-link" href="report-empty.php">
                                        <span class="iconz"><i class="fad fa-fragile fa-lg"></i></span>
                                        <span class="nav-link-text">Empty Loss Report</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-water.php">
                                        <span class="iconz"><i class="fad fa-tint-slash fa-lg"></i></span>
                                        <span class="nav-link-text">Water Loss Report</span>
                                    </a>
                                </li>                        
                                
                            </ul>
                            </ul>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#greport">
                                <span class="iconz"><i class="fad fa-file-invoice-dollar hvr-icon fa-lg"></i></span>
                                <span class="nav-link-text">Expense Reports</span>
                            </a>
                            <ul id="greport" class="nav flex-column collapse collapse-level-1">
                                <ul class="nav flex-column">
                                
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-distribution-expense.php">
                                        <span class="iconz"><i class="fad fa-warehouse fa-lg"></i></span>
                                        <span class="nav-link-text">Distribution Expense</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-employee-expense.php">
                                        <span class="iconz"><i class="fad fa-users fa-lg"></i></span>
                                        <span class="nav-link-text">Employee Expense</span>
                                    </a>
                                </li>
                                <li class="nav-item">                                    
                                    <a class="nav-link" href="report-vehicle-expense.php">
                                        <span class="iconz"><i class="fad fa-rv fa-lg"></i></span>
                                        <span class="nav-link-text">Vehicle Expense</span>
                                    </a>
                                </li>                   
                                
                            </ul>
                            </ul>
                        </li>                        
                        
                        <?php } ?>                    
                    </ul>
                
                    
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>