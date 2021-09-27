<?php
    if($bnl->Route->where("forms") AND !empty($bnl->Route->where("forms"))) {
        $form = $bnl->User->getFormById($bnl->Route->where("forms"),$_SESSION['user_id']);
        if (!$form) die("Ding Dong");
    }
?>
<div class="page-content">
            <div class="main-wrapper">

            <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-body">
                
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-forms" role="tabpanel" aria-labelledby="pills-forms-tab">
                            <button class="btn btn-primary" style="float:left;"><?=$form['unique_id']?>@leadchimp.ai</button>    
                            <h5 class="card-title"><?=$form['name']?></h5>
                                <table id="table-custom" class="display" style="width:100%">
                                    <thead>
                                       
                                        <tr>
                                            <th><?=$bnl->Lang->T("lead-name");?></th>
                                            <th><?=$bnl->Lang->T("lead-phone");?></th>
                                            <th><?=$bnl->Lang->T("actions");?></th>
                              
                                        </tr>
                                    </thead>
                                    <tbody>
                 
                                    <?php
                                        $fetch = $bnl->DB->get("leads",array("form_id"=>"?"),array(),array($form['id']));
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

            </div>
</div>