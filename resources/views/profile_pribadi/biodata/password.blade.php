<div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                
                                     <!-- Change Password Form -->
                                    <form action="{{ route('pegawai.change-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control" id="current_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control" id="new_password" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>