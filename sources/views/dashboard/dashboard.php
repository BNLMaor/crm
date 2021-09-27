
            <div class="page-content">
              <div class="main-wrapper">
                <div class="row">
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">אתרים</h5>
                              <h2><?=$bnl->User->countWebsites($_SESSION['user_id']);?></h2>
                              <p>אתרים בחשבונך </p>
                              <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">טפסים</h5>
                              <h2>287</h2>
                              <p>Orders in waitlist</p>
                              <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">הזמנות</h5>
                              <h2>7.4K</h2>
                              <p>For last 30 days</p>
                              <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-3">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">לידים</h5>
                              <h2>87</h2>
                              <p>Orders in waitlist</p>
                              <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xl-8">
                  <div class="card table-widget">
                          <div class="card-body">
                              <h5 class="card-title">לידים</h5>
                              <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe</th>
                                    <td>Modern</td>
                                    <td>#53327</td>
                                    <td>$20</td>
                                    <td><span class="badge bg-info">Shipped</span></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe</th>
                                    <td>Alpha</td>
                                    <td>#13328</td>
                                    <td>$25</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Anna Doe</th>
                                    <td>Lime</td>
                                    <td>#35313</td>
                                    <td>$20</td>
                                    <td><span class="badge bg-danger">Pending</span></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">John Doe</th>
                                    <td>Circl Admin</td>
                                    <td>#73423</td>
                                    <td>$23</td>
                                    <td><span class="badge bg-primary">Shipped</span></td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><img src="../../assets/images/avatars/profile-image.png" alt="">Nina Doe</th>
                                    <td>Space</td>
                                    <td>#54773</td>
                                    <td>$20</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-xl-4">
                    <div class="card stat-widget">
                      <div class="card-body">
                          <h5 class="card-title">Social Media</h5>
                          <div class="transactions-list">
                            <div class="tr-item">
                              <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-primary text-primary">
                                  <i data-feather="thumbs-up"></i>
                                </div>
                                <div class="tr-text">
                                  <h4>New post reached 7k+ likes</h4>
                                  <p>02 March</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="transactions-list">
                            <div class="tr-item">
                              <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                                  <i data-feather="twitch"></i>
                                </div>
                                <div class="tr-text">
                                  <h4>Developer AMA is now live</h4>
                                  <p>01 March</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="transactions-list">
                            <div class="tr-item">
                              <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-danger text-danger">
                                  <i data-feather="instagram"></i>
                                </div>
                                <div class="tr-text">
                                  <h4>52 unread messages</h4>
                                  <p>23 February</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="transactions-list">
                            <div class="tr-item">
                              <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-warning text-warning">
                                  <i data-feather="shopping-bag"></i>
                                </div>
                                <div class="tr-text">
                                  <h4>2 new orders from shop page</h4>
                                  <p>17 February</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="transactions-list">
                            <div class="tr-item">
                              <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                                  <i data-feather="twitter"></i>
                                </div>
                                <div class="tr-text">
                                  <h4>Hashtag #circl is trending</h4>
                                  <p>03 February</p>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
                <div class="row">
           
                  
         
                  
         
              </div>
              
            </div>