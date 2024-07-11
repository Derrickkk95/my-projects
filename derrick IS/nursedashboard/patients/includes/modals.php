            <!-- Record Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Allergies and Immunization Status Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <h1 class="h6 mb-3 fw-normal">Fields marked with <span style="color:red">*</span> are required</h1>
                  <form action="patientstore.php" method="post">
                    <!-- <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Patient Allergies <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputName" placeholder="Charlie Joe" name="patient" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSpecialization">Age <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="inputAge" placeholder="18" name="age" required>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputAllergies">Allergies <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputAllergies" name="allergies" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inputImmunization">Immunization Status <span style="color:red">*</span></label>
                        <select class="form-select " aria-label="Small select example" name="immunization" required>
                          <option selected>Open this select menu</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail">Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="xyz@mail.com" name="email" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputMobile">Phone Number <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="inputMobile" placeholder="0712 345 678" name="phone" required>
                      </div>
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Record" value="<?php echo $patientID;?>">Register Record</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Appointment Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Schedule Patient Appointment Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <h1 class="h6 mb-3 fw-normal">Fields marked with <span style="color:red">*</span> are required</h1>
                  <form action="patientstore.php" method="post">
                    <!-- <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Patient Allergies <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputName" placeholder="Charlie Joe" name="patient" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSpecialization">Age <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="inputAge" placeholder="18" name="age" required>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputAppointment">Appointment Date <span style="color:red">*</span></label>
                        <input type="date" class="form-control" id="inputAppointment" name="appointmentdate" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="mr-sm-2" for="inputDoctor">Assign Doctor <span style="color:red">*</span></label>
                        <select class="form-select " aria-label="Small select example" name="doctor" required>
                          <option selected>Open this select menu</option>
                          <?php
                            $docsql = "SELECT `docID`,`docName` FROM `doctors`";
                            $docresult = mysqli_query($mysqli, $docsql);
                            foreach ($docresult as $doc) {
                                $doctid = $doc['docID'];
                                $doctname = $doc['docName'];
                                ?>
                                <option value="<?php echo $doctid;?>"><?php echo $doctname;?></option>
                            <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail">Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="xyz@mail.com" name="email" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputMobile">Phone Number <span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="inputMobile" placeholder="0712 345 678" name="phone" required>
                      </div>
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Appointment" value="<?php echo $patientID;?>">Save Appointment</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>