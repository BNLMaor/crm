<?php 
    if(!$bnl->Route->where("translations")) {die("err");}
    $lang = $bnl->Route->where("translations");
?>


<div class="page-content">
              <div class="main-wrapper">
              <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" style="float:left;"><?=$bnl->Lang->T("add-new-translation");?></button>
                                <h5 class="card-title"><?=$bnl->Lang->T("manage-translations");?> </h5>

                                <table id="table-custom" class="display" style="width:100%">
                                    <thead>
                                       
                                        <tr>
                                            <th><?=$bnl->Lang->T("translation-title");?></th>
                                            <th><?=$bnl->Lang->T("translation");?></th>
                                            <th><?=$bnl->Lang->T("actions");?></th>
                              
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i =0;
                                        $fetch = $bnl->DB->get("translations",array(),array(),array());
                                        if (count($fetch) > 0 ) {
                                            foreach ($fetch as $key => $row) {
                                                $i = ++$i;
                                       
                                    ?>
                                        <tr>
                                            <td><?=$row['title']?></td>
                                            <td><?=$row[$lang]?></td>
                                            <td>
                                                <button type="button"  data-bs-toggle="modal" data-bs-target="#editModal-<?=$i;?>" class="btn btn-outline-warning m-b-xs mt-2">עריכה</button>
                                                <button type="button" class="btn btn-outline-danger m-b-xs mt-2">מחיקה</button>
                                            </td>
                                  
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?=$bnl->Lang->T("edit-translation");?> - <?=$row['title']?></h5>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" role="ajax" data-ajax="editTranslation">
                                                    <input type="hidden" name="lang" value="<?=$lang?>">
                                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                            
                                                <div class="modal-body">
                                                <div class="response"></div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                    <label for="text" class="form-label"><?=$bnl->Lang->T("translate");?></label>
                                                    <input type="text" name="translation" class="form-control" id="text" value="<?=$row[$lang]?>" aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$bnl->Lang->T("cancel");?></button>
                                                <button type="submit" class="btn btn-primary"><?=$bnl->Lang->T("edit");?></button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    <?php

                                          }
                                        }

                                    ?>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
              <!-- Edit Modal -->
              <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?=$bnl->Lang->T("add-translation");?></h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" role="ajax" data-ajax="addTranslation">   
                        <input type="hidden" name="lang" value="<?=$lang?>">
                 
                        <div class="modal-body">
                        <div class="response"></div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="text" class="form-label"><?=$bnl->Lang->T("translate-title");?></label>
                                <input type="text" name="title" class="form-control" id="text"  aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label"><?=$bnl->Lang->T("translation");?></label>
                                <input type="text" name="translation" class="form-control" id="text"  aria-describedby="emailHelp">
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