<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="survey2.php">
                <p class="text-center fs-2">Career Pathways Program</p>
                <div class="bg-white my-3 border rounded-3">
                    <label for="partner-organization" class="form-label fs-5 m-2">
                        Who referred you to our program or what partner organization are you from?
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner">
                        <option selected>Choose</option>
                        <option value="friend&fam">Friend and Family</option>
                        <option value="Hiring_event">Hiring Event or Career Fair</option>
                        <option value="Wonmen_Emp">Women's Empowerment</option>
                        <option value="NextMove">Next Move</option>
                        <option value="Waking_Village">Waking the Village</option>
                        <option value="SaintJ">Saint John's</option>
                        <option value="LaFam">La Familia</option>
                        <option value="GSU">GS Urban League</option>
                        <option value="AsianRe">Asian Resources</option>
                        <option value="FolsomCP">Folsom Cordova CP</option>
                        <option value="LemonH">Lemon Hill</option>
                        <option value="SacJ">Sac Job Corp</option>
                        <option value="Public">Public/Aura Planning</option>
                        <option value="International">International Rescue Committee Sacramento</option>
                    </select>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="FirstName" class="form-label fs-5 m-2">
                        First Name
                        <span class="text-danger">*</span>
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="fname" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="MiddleName" class="form-label fs-5 m-2">
                        Middle Name
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="mname" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="LastName" class="form-label fs-5 m-2">
                        Last Name
                        <span class="text-danger">*</span>
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="lname" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="SSN" class="form-label fs-5 m-2">
                        Last four numbers of your Social Security Number
                        <span class="text-danger">*</span>
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="ssn" placeholder="Your answer" maxlength="4">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="address" class="form-label fs-5 m-2">
                        Address including City, State, Zip Code, and County
                        <span class="text-danger">*</span>
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="address" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="sameAddress" class="form-label fs-5 m-2">
                        Is your mailing address the same as your address above?
                    </label>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="sameAdd?" id="sameAdd">
                        <label class="form-check-label" for="sameAd">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="sameAdd?" id="difAdd">
                        <label class="form-check-label" for="difAd">
                          No
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="maillingAddress" class="form-label fs-5 m-2">
                        If no, what is your mailing address?
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="maillingAdd" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="Phone" class="form-label fs-5 m-2">
                        Primary Phone Number 
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <input type="phone" class="m-2 input-underline" id="phone" placeholder="Your answer">
                    <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType">
                        <option value="cellphone" selected>Cell Phone</option>
                        <option value="homePhone">Home Phone</option>
                        <option value="relativesPhone">Relatives Phone</option>
                        <option value="workphone">Work Phone</option>
                        <option value="otherphone">Other</option>
                    </select>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="alPhone" class="form-label fs-5 m-2">
                        Alternative Phone Number 
                    </label>
                    <br>
                    <input type="phone" class="m-2 input-underline" id="alterphone" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="email" class="form-label fs-5 m-2">
                        Primary Email
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <input type="email" class="m-2 input-underline" id="maillingAdd" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="bthday" class="form-label fs-5 m-2">
                        Birthday
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <input type="date" class="m-2 input-underline" id="bthday">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="gender" class="form-label fs-5 m-2">
                        Gender
                    </label>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="gender" id="notSay">
                        <label class="form-check-label" for="notSay">
                          Frefer not to say
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="gender" id="other">
                        <label class="form-check-label" for="other">
                          Other
                        </label>
                        <input type="text" class="m-2 input-underline" id="other" placeholder="Your answer">
                    </div>
                </div>
                <div class="d-flex justify-content-between m-1">
                    <a href="index.php" name="back" id="backBtn" value="back" class="btn btn-primary">Back</a>
                    <input type="submit" name="back" id="NextBtn" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>