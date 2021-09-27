
            <div class="page-content">
              <div class="main-wrapper">
              <?php
                if($bnl->Route->where("websites") AND !empty($bnl->Route->where("websites"))) {
                  $website = $bnl->User->getWebsiteById ($bnl->Route->where("websites"),$_SESSION['user_id']);
                  if (!$website) die("Ding Dong");
              ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="profile-cover"></div>
                        <div class="profile-header">
           
                            <div class="profile-name">
                                <h3><?=$website['name'];?></h3>
                            </div>
                            <div class="profile-header-menu">
                            <ul class="nav nav-pills list-unstyled" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn btn-success" id="pills-forms-tab" data-bs-toggle="pill" data-bs-target="#pills-forms" type="button" role="tab" aria-controls="pills-home" aria-selected="true">טפסים</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-primary" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">לידים</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-primary" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">שליקים</button>
                            </li>
                            </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">טפסים</h5>
                              <h2><?=$bnl->User->countWebsites($_SESSION['user_id']);?></h2>
                              <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">טפסים</h5>
                              <h2>287</h2>
                              <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">הזמנות</h5>
                              <h2>7.4K</h2>
                              <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">לידים חדשים</h5>
                              <h2>87</h2>
                              <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">
                
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-forms" role="tabpanel" aria-labelledby="pills-forms-tab">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormModal" style="float:left;"><?=$bnl->Lang->T("add-new-form");?></button>
                                <h5 class="card-title"><?=$bnl->Lang->T("manage-forms");?></h5>
                                <table id="table-custom" class="display" style="width:100%">
                                    <thead>
                                       
                                        <tr>
                                            <th><?=$bnl->Lang->T("form-name");?></th>
                                            <th><?=$bnl->Lang->T("pniot");?></th>
                                            <th><?=$bnl->Lang->T("actions");?></th>
                              
                                        </tr>
                                    </thead>
                                    <tbody>
                 
                                    <?php
                                        $fetch = $bnl->DB->get("forms",array("user_id"=>"?","web_id"=>"?"),array(),array($user['id'],$website['id']));
                                        if (count($fetch) > 0 ) {
                                            foreach ($fetch as $key => $row) {
                                               
                                       
                                    ?>
                                        <tr>
                                            <td><?=$row['name']?></td>
                                            <td>0</td>
                                            <td>
                                                <a href="forms/<?=$row['unique_id']?>"><button type="button" class="btn btn-outline-primary m-b-xs mt-2">פרטים</button></a>
                                                <a href="websites/<?=$row['id']?>/delete"><button type="button" class="btn btn-outline-danger m-b-xs mt-2">מחיקה</button></a>
                                            </td>
                                            <td></td>
                                  
                                        </tr>
                                    <?php
                                          }
                                        }

                                    ?>
                                    </tfoot>
                                </table>
                                                       <!-- Modal -->
                            <div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?=$bnl->Lang->T("add-new-form");?></h5>
                                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" role="ajax" data-ajax="addNewForm">
                                      <input type="hidden" name="web_id" value="<?=$website['id']?>">
                                
                                    <div class="modal-body">
                                    <div class="response"></div>
                                        <div class="mb-3">
                                          <label for="text" class="form-label"><?=$bnl->Lang->T("form-name");?></label>
                                          <input type="text" name="name" class="form-control" id="text" aria-describedby="emailHelp">
                                        </div>
                                    </div>

                                    <?php
                                       $fetch = $bnl->DB->get("form_types");

                                    ?>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                          <label for="text" class="form-label"><?=$bnl->Lang->T("form-type");?></label>
                                          <select class="form-select" name="type" aria-label="Default select example">
                                            <option selected="" value="">בחר סוג טופס</option>
                                            <?php foreach ($fetch as $key => $value){ ?>
                                              <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                            <?php } ?>
                                            
                                      </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$bnl->Lang->T("cancel");?></button>
                                    <button type="submit" class="btn btn-primary"><?=$bnl->Lang->T("add");?></button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">222</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                            </div>
                            </div>
                         </div>
                </div>
                </div>

            
                <?php } else { ?>


              <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWebsiteModal" style="float:left;"><?=$bnl->Lang->T("add-new-website");?></button>
                                <h5 class="card-title"><?=$bnl->Lang->T("manage-websites");?></h5>

                                <table id="table-custom" class="display" style="width:100%">
                                    <thead>
                                       
                                        <tr>
                                            <th><?=$bnl->Lang->T("website-name");?></th>
                                            <th><?=$bnl->Lang->T("website-address");?></th>
                                            <th><?=$bnl->Lang->T("website-forms");?></th>
                                            <th><?=$bnl->Lang->T("website-orders");?></th>
                                            <th><?=$bnl->Lang->T("actions");?></th>
                              
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $fetch = $bnl->DB->get("websites",array("user_id"=>"?"),array(),array($user['id']));
                                        if (count($fetch) > 0 ) {
                                            foreach ($fetch as $key => $row) {
                                                $forms = count($bnl->User->getFormsByWebsiteId($row['id']));
                                                $orders = count($bnl->User->getFormsByWebsiteId($row['id']));
                                       
                                    ?>
                                        <tr>
                                            <td><?=$row['name']?></td>
                                            <td><a href="<?=$row['address']?>"><button type="button" class="btn btn-outline-primary m-b-xs mt-2">הכנס לאתר</button></a></td>
                                            <td><?=$forms?></td>
                                            <td><?=$orders?></td>
                                            <td>
                                                <a href="websites/<?=$row['id']?>"><button type="button" class="btn btn-outline-primary m-b-xs mt-2">פרטים</button></a>
                                                <a href="websites/<?=$row['id']?>/edit"><button type="button" class="btn btn-outline-warning m-b-xs mt-2">עריכה</button></a>
                                                <a href="websites/<?=$row['id']?>/delete"><button type="button" class="btn btn-outline-danger m-b-xs mt-2">מחיקה</button></a>
                                            </td>
                                            <td></td>
                                  
                                        </tr>
                                    <?php
                                          }
                                        }

                                    ?>
                                    </tfoot>
                                </table>
                            </div>
                              <!-- Modal -->
                            <div class="modal fade" id="addWebsiteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?=$bnl->Lang->T("add-new-website");?></h5>
                                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" role="ajax" data-ajax="addNewWebsite">
                                
                                    <div class="modal-body">
                                    <div class="response"></div>
                                        <div class="mb-3">
                                          <label for="text" class="form-label"><?=$bnl->Lang->T("website-name");?></label>
                                          <input type="text" name="name" class="form-control" id="text" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                          <label for="text" class="form-label"><?=$bnl->Lang->T("website-address");?></label>
                                          <input type="text" name="address" class="form-control" id="text" placeholder="https://www.google.com" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$bnl->Lang->T("cancel");?></button>
                                    <button type="submit" class="btn btn-primary"><?=$bnl->Lang->T("add");?></button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
         
              </div>
              
            </div>
