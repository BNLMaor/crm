
            <div class="page-content">
              <div class="main-wrapper">
              <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLanguageModal" style="float:left;"><?=$bnl->Lang->T("add-new-language");?></button>
                                <h5 class="card-title"><?=$bnl->Lang->T("manage-languages");?></h5>

                                <table id="table-custom" class="display" style="width:100%">
                                    <thead>
                                       
                                        <tr>
                                            <th><?=$bnl->Lang->T("language-name");?></th>
                                            <th><?=$bnl->Lang->T("language-symbol");?></th>
                                            <th><?=$bnl->Lang->T("actions");?></th>
                              
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $fetch = $bnl->DB->get("languages");
                                        if (count($fetch) > 0 ) {
                                            foreach ($fetch as $key => $row) {
                                       
                                    ?>
                                        <tr>
                                            <td><?=$row['language_full']?></td>
                                            <td><img src="https://www.countryflags.io/<?=$row['country']?>/shiny/64.png"></td>
                                            <td>
                                                <a href="admin/translations/<?=$row['language']?>"><button type="button" class="btn btn-outline-primary m-b-xs mt-2"><?=$bnl->Lang->T("translations");?></button></a>

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
                            <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

         
              </div>
              
            </div>