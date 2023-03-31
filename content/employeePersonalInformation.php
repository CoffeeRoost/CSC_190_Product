          <!--Participant information-->
          <div class="d-flex flex-column align-items-center mx-5">
              <div class="d-flex justify-center">
                 <div id="employee_Info" style="width: 1000px; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse show">
                        <div  class="row mx-3 my-2">
                            <div class="col-3 fw-bold">ID</div>
                            <div class="col-6 text-center">1</div>
                            <div class="col-1 ms-5">
                                <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employee_edit,#employee_Info">Edit</a>
                            </div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">First Name</div>
                            <div class="col-7">Joe</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Last Name</div>
                            <div class="col-7">Do</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Middle Name (MI)</div>
                            <div class="col-7">J</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Email</div>
                            <div class="col-7">JohnD@gmail.com</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Date of Birth</div>
                            <div class="col-7">03/12/2023</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Street</div>
                            <div class="col-7">9854 any Street</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">City</div>
                            <div class="col-7">anyCity</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">State</div>
                            <div class="col-7">STate</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Zip Code</div>
                            <div class="col-7">zipcode</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Phone</div>
                            <div class="col-7">986-542-3563</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Gender</div>
                            <div class="col-7">male</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Race</div>
                            <div class="col-7">white</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Role</div>
                            <div class="col-7">developer</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Password</div>
                            <div class="col-7">*****</div>
                        </div>
                        <div  class="row mx-3 my-2">
                            <div class="col fw-bold">Program Member</div>
                            <div class="col-7">any of them</div>
                        </div>
                    </div>


                     <!-- employee information Edit-->
                     <div id="employee_edit" style="width: 1000px ; height:auto; transition:1ms;" class="bg-lightBlue my-5 mx-3 collapse">
                        <form method="POST" action="">
                            <div class="row mx-3 my-2">
                                <div class="col-3 fw-bold">ID</div>
                                <div class="col-6 text-center">1</div>
                                <div class="col-1 ms-5">
                                    <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#employee_Info,#employee_edit">Save</button>
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">First Name</div>
                                <div class="col-7">
                                    <input type="text" name="fname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="Joe">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Last Name</div>
                                <div class="col-7">
                                    <input type="text" name="lname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="Doe">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Middle Name (MI)</div>
                                <div class="col-7">
                                    <input type="text" name="lname" id="" class="input-underline bg-lightBlue" style="width:75%;" value="J">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Email</div>
                                <div class="col-7">
                                    <input type="email" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" value="email">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Date of Birth</div>
                                <div class="col-7">
                                    <input type="email" name="email" id="" class="input-underline bg-lightBlue" style="width:75%;" value="03/12/2023">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Street</div>
                                <div class="col-7">
                                    <input type="text" name="street" id="" class="input-underline bg-lightBlue" style="width:75%;" value="street">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">City</div>
                                <div class="col-7">
                                    <input type="text" name="city" id="" class="input-underline bg-lightBlue" style="width:75%;" value="city">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">State</div>
                                <div class="col-7">
                                    <input type="text" name="state" id="" class="input-underline bg-lightBlue" style="width:75%;" value="state">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Zip Code</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="zipcode">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Phone</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="986-542-3563">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Gender</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="male">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Race</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="white">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Role</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="developer">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Password</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="Password">
                                </div>
                            </div>
                            <div class="row mx-3 my-2">
                                <div class="col fw-bold">Program Member</div>
                                <div class="col-7">
                                    <input type="text" name="zipcode" id="" class="input-underline bg-lightBlue" style="width:75%;" value="Program Member">
                                </div>
                            </div>
                         </form>
                      </div>
                </div>
              </div>
            </div>



