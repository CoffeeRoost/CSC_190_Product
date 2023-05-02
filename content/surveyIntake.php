<body>
	<script>
		function validateEmail()
		{
			value       = document.getElementById("password").value;
			length8		= (value.length >= 8);
			uppercase	= value.match(/[A-Z]/);
			lowercase	= value.match(/[a-z]/);
			special		= value.match(/[^\w]/);
			invalid		= (!length8 || !uppercase || !lowercase || !special);
			
			document.getElementById("verification").hidden 		= !invalid;
			document.getElementById("signup-submit").disabled	= invalid;
		}
	</script>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="includes/newAccount.inc.php" method="post">
		           <div id="survey1" style="transition: 1ms" class="collapse show">
                  <p class="text-center fs-2">Career Pathways Program</p>
                  <div class="bg-white my-3 border rounded-3">
                      <label for="partner-organization" class="form-label fs-5 m-2">
                          Who referred you to our program or what partner organization are you from?
                          <span class="text-danger">*</span>
                      </label>
                        <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner" required>
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="Friend and Family">Friend and Family</option>
                            <option value="Hiring Event or Career Fair">Hiring Event or Career Fair</option>
                            <option value="Women's Empowerment">Women's Empowerment</option>
                            <option value="Next Move">Next Move</option>
                            <option value="Waking the Village">Waking the Village</option>
                            <option value="Saint John's">Saint John's</option>
                            <option value="La Familia">La Familia</option>
                            <option value="GS Urban League">GS Urban League</option>
                            <option value="Asian Resources">Asian Resources</option>
                            <option value="Folsom Cordova CP">Folsom Cordova CP</option>
                            <option value="Lemon Hill">Lemon Hill</option>
                            <option value="Sac Job Corp">Sac Job Corp</option>
                            <option value="Public/Aura Planning">Public/Aura Planning</option>
                            <option value="International Rescue Committee Sacramento">International Rescue Committee Sacramento</option>
                            <option value="Community Resource Project">Community Resource Project</option>
                            <option value="Fellowship">Fellowship</option>
                            <option value="Other">Other</option>
                        </select>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="fname" class="form-label fs-5 m-2">
                            First Name
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="fname" id="fname" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mname" class="form-label fs-5 m-2">
                            Middle Name
                        </label>
                        <br>
                        <input type="text" name="mname" id="mname" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="lname" class="form-label fs-5 m-2">
                            Last Name
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="lname" id="lname" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="SSN" class="form-label fs-5 m-2">
                            Last four numbers of your Social Security Number
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="SSN" id="SSN" class="m-2 input-underline" placeholder="Your answer"
                        maxlength="4" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="street" class="form-label fs-5 m-2">
                            Address: Street & Number
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="street" id="street" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="city" class="form-label fs-5 m-2">
                            Address: City
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="city" id="city" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                    <label for="state" class="form-label fs-5 m-2">
                      Address: State
                      <span class="text-danger">*</span>
                    </label><br>
                    <select class="form-select-SM m-2 border rounded-2" name="state" id="state" required>
                      <option value="Alabama">Alabama</option>
                      <option value="Alaska">Alaska</option>
                      <option value="Arizona">Arizona</option>
                      <option value="Arkansas">Arkansas</option>
                      <option value="California">California</option>
                      <option value="Colorado">Colorado</option>
                      <option value="Connecticut">Connecticut</option>
                      <option value="Delaware">Delaware</option>
                      <option value="Florida">Florida</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Hawaii">Hawaii</option>
                      <option value="Idaho">Idaho</option>
                      <option value="Illinois">Illinois</option>
                      <option value="Indiana">Indiana</option>
                      <option value="Iowa">Iowa</option>
                      <option value="Kansas">Kansas</option>
                      <option value="Kentucky">Kentucky</option>
                      <option value="Louisiana">Louisiana</option>
                      <option value="Maine">Maine</option>
                      <option value="Maryland">Maryland</option>
                      <option value="Massachusetts">Massachusetts</option>
                      <option value="Michigan">Michigan</option>
                      <option value="Minnesota">Minnesota</option>
                      <option value="Mississippi">Mississippi</option>
                      <option value="Missouri">Missouri</option>
                      <option value="Montana">Montana</option>
                      <option value="Nebraska">Nebraska</option>
                      <option value="Nevada">Nevada</option>
                      <option value="New Hampshire">New Hampshire</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New Mexico">New Mexico</option>
                      <option value="New York">New York</option>
                      <option value="North Carolina">North Carolina</option>
                      <option value="North Dakota">North Dakota</option>
                      <option value="Ohio">Ohio</option>
                      <option value="Oklahoma">Oklahoma</option>
                      <option value="Oregon">Oregon</option>
                      <option value="Pennsylvania">Pennsylvania</option>
                      <option value="Rhode Island">Rhode Island</option>
                      <option value="South Carolina">South Carolina</option>
                      <option value="South Dakota">South Dakota</option>
                      <option value="Tennessee">Tennessee</option>
                      <option value="Texas">Texas</option>
                      <option value="Utah">Utah</option>
                      <option value="Vermont">Vermont</option>
                      <option value="Virginia">Virginia</option>
                      <option value="Washington">Washington</option>
                      <option value="West Virginia">West Virginia</option>
                      <option value="Wisconsin">Wisconsin</option>
                      <option value="Wyoming">Wyoming</option>
                    </select>

                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="zip" class="form-label fs-5 m-2">
                            Address: Zip Code
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="zip" id="zip" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="county" class="form-label fs-5 m-2">
                            Address: County
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="county" id="county" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="sameAdd" class="form-label fs-5 m-2">
                            Is your mailing address information the same as your address information above?
				    <span class="text-danger">*</span>
                        </label>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sameAdd" id="ysameAdd" value="Yes" required>
                            <label class="form-check-label" for="ysameAdd">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sameAdd" id="difAdd" value="No">
                            <label class="form-check-label" for="difAdd">
                              No
                            </label>
                        </div>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailStreet" class="form-label fs-5 m-2">
                            (If above was No) Mailing Address: Street & Number
                        </label>
                        <br>
                        <input type="text" name="mailStreet" id="mailStreet" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailCity" class="form-label fs-5 m-2">
                            Mailing Address: City
                        </label>
                        <br>
                        <input type="text" name="mailCity" id="mailCity" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailState" class="form-label fs-5 m-2">
                            Mailing Address: State
                        </label>
                        <br>
                        <input type="text" name="mailState" id="mailState" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailZip" class="form-label fs-5 m-2">
                            Mailing Address: Zip Code
                        </label>
                        <br>
                        <input type="text" name="mailZip" id="mailZip" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="mailCounty" class="form-label fs-5 m-2">
                              Mailing Address: County
                          </label>
                          <br>
                          <input type="text" name="mailCounty" id="mailCounty" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="phone" class="form-label fs-5 m-2">
                              Primary Phone Number
                          </label>
                          <span class="text-danger">*</span>
                          <br>
                          <input type="phone" name="phone" id="phone" class="m-2 input-underline" placeholder="Your answer" required>
                          <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType" required>
                              <option value="Cell Phone" selected>Cell Phone</option>
                              <option value="Home Phone">Home Phone</option>
                              <option value="Relatives Phone">Relatives Phone</option>
                              <option value="Work phone">Work Phone</option>
                              <option value="Other">Other</option>
                          </select>
                   </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="alPhone" class="form-label fs-5 m-2">
                              Alternative Phone Number
                          </label>
                          <br>
                          <input type="phone" name="alPhone" id="alPhone" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                      <div class="bg-white my-3 border rounded-3">
                          <label for="email" class="form-label fs-5 m-2">
                              Primary Email
                          </label>
                          <span class="text-danger">*</span>
                          <br>
                          <input type="email" name="email" id="email" class="m-2 input-underline" placeholder="Your answer" required>
                  </div>

                      <div class="bg-white my-3 border rounded-3">
                          <label for="bthday" class="form-label fs-5 m-2">
                              Birthday
                          </label>
                          <span class="text-danger">*</span>
                          <br>
                          <input type="date" name="bthday" id="bthday" class="m-2 input-underline" required>
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="gender" class="form-label fs-5 m-2">
                              Gender
                          </label>
                        <span class="text-danger">*</span>
                          <br>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                              <label class="form-check-label" for="male">
                                Male
                              </label>
                            </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                              <label class="form-check-label" for="female">
                                Female
                              </label>
                          </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="notSay" value="Not Say" required>
                              <label class="form-check-label" for="notSay">
                                Prefer not to say
                              </label>
                          </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                              <label class="form-check-label" for="other">
                                Other
                              </label>
                              <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" placeholder="Your answer"/>
                        </div>
                  </div>
                  <div class="d-flex justify-content-between m-1">
                        <a href="index.php" class="btn btn-primary">Back</a>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey1,#survey2" class="btn btn-primary">Next</button>
                        
                  </div>
                </div>

          <!--*************************************************************************************-->
                  
               <div id="survey2" style="transition: 1ms" class="collapse">
                    <p class="text-center fs-2">Career Pathways Program</p>
                    <div class="bg-white my-3 border rounded-3">
                        <label for="citizenship" class="form-label fs-5 m-2">
                            US Citizenship Status
                            <span class="text-danger">*</span>
                        </label><br>
                        <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship" required>
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="Citizen">Citizen of US or US Territory</option>
                            <option value="US Pernament Resident">US Permanent Resident</option>
                            <option value="Alien/Refugee Lawfully Admitted to the US">Alien/Refugee Lawfully Admitted to the US</option>
                            <option value="None Citizen">None of the above</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="uscisNumber" class="form-label fs-5 m-2">
                            If a U.S. Permanent Resident or an Alien/Refugee lawfully admitted to the U.S., please provide your:
                        </label>
                        <br>
                        <input type="text" name="uscisNumber" id="uscisNumber" class="m-2 input-underline" placeholder="Alien Registration Number">
                        <label for="uscisExpired" class="form-label m-2">
                            Expired Date
                        </label>
                        <input type="date" id="uscisExpired" name="uscisExpired" class="m-2 input-underline">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="selective" class="form-label fs-5 m-2">
                            Have you registered with the Selective Service? Only applicable for men ages 18 to 25
                            <span class="text-danger">*</span></label>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="selective" id="yselective" value="Yes">
                            <label class="form-check-label" for="yselective">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="selective" id="nonSelective" value="No">
                            <label class="form-check-label" for="nonSelective">
                              No
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="selective" id="docExemption" value="Documented exemption">
                            <label class="form-check-label" for="docExemption">
                              Documented exemption
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="selective" id="notApplicable" value="Not applicable" required>
                            <label class="form-check-label" for="notApplicable">
                              Not applicable
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="hispanic" class="form-label fs-5 m-2">
                            Hispanic/Latino Heritage
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes" required>
                            <label class="form-check-label" for="yhispanic">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No">
                            <label class="form-check-label" for="nonhispanic">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label class="form-label fs-5 m-2">
                            Race (Ethnicity) check all that apply
                            <span class="text-danger">*</span></label><br>
                        <div class="form-check m-2">
                            <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes">
                            <label for="africanAmerican_black">African American/Black</label><br>
                        </div>
                        <div class="form-check m-2">
                            <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes">
                            <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                        </div>
                        <div class="form-check m-2">
                            <input type="checkbox" id="asian" name="asian" value="Yes">
                            <label for="asian">Asian</label><br>
                        </div>
                        <div class="form-check m-2">
                            <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes">
                            <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                        </div>
                        <div class="form-check m-2">
                            <input type="checkbox" id="white" name="white" value="Yes">
                            <label for="white">White</label><br>
                        </div>
                        <div class="form-check m-2">
                            <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes">
                            <label for="noAnswer">I do not wish to answer</label><br>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="language" class="form-label fs-5 m-2">
                            What is your primary language?
                            <span class="text-danger">*</span>
                        </label><br>
                        <select class="form-select-SM m-2 border rounded-2" name="language" id="language" required>
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="English">English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Dari">Dari</option>
                            <option value="Pashto">Pashto</option>
                            <option value="Russian">Russian</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Mandarin">Mandarin</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Farsi">Farsi</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="proficiency" class="form-label fs-5 m-2">
                            Do you have limited proficiency in speaking, writing, reading, or understanding English?
                            or Do you have difficulty in speaking, writing, reading, or understanding English?
			    <span class="text-danger">*</span>
			</label>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes">
                            <label class="form-check-label" for="yproficiency">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No">
                            <label class="form-check-label" for="nonProficiency">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="disability" class="form-label fs-5 m-2">
                            Do you have a disability?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="disability" id="ydisability" value="Yes" required>
                            <label class="form-check-label" for="ydisability">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="disability" id="nonDisability" value="No">
                            <label class="form-check-label" for="nonDisability">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="typeDisability" class="form-label fs-5 m-2">
                            Please use the following space to indicate your disability.
                        </label>
                        <br>
                        <input type="text" name="typeDisability" id="typeDisability" class="m-2 input-underline" placeholder="Your answer">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="schoolLevel" class="form-label fs-5 m-2">
                            Highest school grade completed?
                            <span class="text-danger">*</span>
                        </label><br>
                        <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel" required>
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="9th">9th grade</option>
                            <option value="10th">10th grade</option>
                            <option value="11th">11th grade</option>
                            <option value="12th">12th grade</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="diploma" class="form-label fs-5 m-2">
                            High school diploma or equivalent received
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes" required>
                            <label class="form-check-label" for="ydiploma">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No">
                            <label class="form-check-label" for="nonDiploma">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="highestSchool" class="form-label fs-5 m-2">
                            Highest school grade completed?
                            <span class="text-danger">*</span>
                        </label><br>
                        <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool" required>
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="High School">High School Diploma</option>
                            <option value="GED">High School Equivalent Diploma (GED)</option>
                            <option value="Certificate of Attendance/Completion">Certificate of Attendance/Completion (Disabled Individuales)</option>
                            <option value="Vocational School Certificate">Vocational School Certificate</option>
                            <option value="College or Technical or Vocational School">College or Technical or Vocational School</option>
                            <option value="AA/AS">AA/AS</option>
                            <option value="BA/BS">BA/BS</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Doctor's Degree">Doctorate Degree</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="schoolStatus" class="form-label fs-5 m-2">
                            School Status
                            <span class="text-danger">*</span></label>
            
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes" required>
                            <label class="form-check-label" for="inSchool">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="schoolStatus" id="notInschool" value="No">
                            <label class="form-check-label" for="notInschool">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between m-1">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey1" class="btn btn-primary">Back</button>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey3" class="btn btn-primary">Next</button>
                        
                    </div>
                  </div>

          <!--*************************************************************************************-->
                
              <div id="survey3" style="transition: 1ms" class="collapse">
                    <p class="text-center fs-2">Career Pathways Program</p>
                    <div class="bg-white my-3 border rounded-3">
                        <label for="military" class="form-label fs-5 m-2">
                            Are you currently in the U.S. Military or a Veteran?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="military" id="ymilitary" value="Yes" required>
                            <label class="form-check-label" for="ymilitary">
                              Yes
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="military" id="nonMilitary" value="No">
                            <label class="form-check-label" for="nonMilitary">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="militarySpouse" class="form-label fs-5 m-2">
                            Are you the spouse of a member of the armed forces who is on active duty?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="militarySpouse" id="ymilitarySpouse" value="Yes" required>
                            <label class="form-check-label" for="ymilitarySpouse">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="militarySpouse" id="nonMilitarySpouse" value="No">
                            <label class="form-check-label" for="nonMilitarySpouse">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="employment" class="form-label fs-5 m-2">
                            Employment Status
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="employment" id="yemployment" value="Employed" required>
                            <label class="form-check-label" for="yemployment">
                              Employed
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="employment" id="nonEmployment" value="Not Employed">
                            <label class="form-check-label" for="nonEmployment">
                              Not Employed
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="employment" id="termination" value="Employed but received notice of termination or separation from military service">
                            <label class="form-check-label" for="termination">
                                Employed but received notice of termination or separation from military service
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="payRate" class="form-label fs-5 m-2">
                            If you are employed, what is your current rate of pay?
                        </label>
                        <br>
                        <input type="number" name="payRate" id="payRate" class="m-2 input-underline" placeholder="Your answer">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="ui" class="form-label fs-5 m-2"> 
                          Are you receiving Unemployment Insurance?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ui" id="claimant" value="Claimant">
                            <label class="form-check-label" for="claimant">
                              Claimant
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ui" id="exhaustee" value="Exhaustee">
                            <label class="form-check-label" for="exhaustee">
                              Exhaustee
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ui" id="neither" value="Neither" required>
                            <label class="form-check-label" for="neither">
                                Neither
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="uiWeek" class="form-label fs-5 m-2">
                            If you are unemployed, how many weeks have you been unemployed?
                        </label>
                        <br>
                        <input type="number" name="uiWeek" id="uiWeek" class="m-2 input-underline" placeholder="Your answer">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="farmworker" class="form-label fs-5 m-2">
                            Have you worked as farmworker in the last 12 months?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="farmworker" id="yfarmworker" value="Yes" required>
                            <label class="form-check-label" for="yfarmworker">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="farmworker" id="nonFarmworker" value="No">
                            <label class="form-check-label" for="nonFarmworker">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="jobTitle" class="form-label fs-5 m-2">
                            What is your desired job title?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <input type="text" name="jobTitle" id="jobTitle" class="m-2 input-underline" placeholder="Your answer" required>
                    </div>

                    <div class="d-flex justify-content-between m-1">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey2,#survey3" class="btn btn-primary">Back</button>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey3,#survey4" class="btn btn-primary">Next</button>
                        
                    </div>
                </div>
            
         <!--*************************************************************************************-->
           
              
                <div id="survey4" style="transition: 1ms" class="collapse">
                    <p class="text-center fs-2">Career Pathways Program</p>
                    <div class="bg-white my-3 border rounded-3">
                        <label for="foster" class="form-label fs-5 m-2">
                            Have you been supported through the State's Foster Care System?
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="foster" id="yfoster" value="Yes" required>
                            <label class="form-check-label" for="yfoster">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="foster" id="nonFoster" value="No">
                            <label class="form-check-label" for="nonFoster">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="adultEdu" class="form-label fs-5 m-2">
                            Receiving services from Adult Education (WIOA Title II)
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="adultEdu" id="yadultEdu" value="Yes" required>
                            <label class="form-check-label" for="yadultEdu">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="adultEdu" id="nonAdultEdu" value="No">
                            <label class="form-check-label" for="nonAdultEdu">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="youthBuild" class="form-label fs-5 m-2">
                            Receiving services from Youth Build
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="youthBuild" id="yyouthBuild" value="Yes" required>
                            <label class="form-check-label" for="yyouthBuild">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="youthBuild" id="nonYouthBuild" value="No">
                            <label class="form-check-label" for="nonYouthBuild">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="youthGrantNum" class="form-label fs-5 m-2">
                            Youth Build Grant Number
                        </label>
                        <br>
                        <input type="text" name="youthGrantNum" id="youthGrantNum" class="m-2 input-underline" placeholder="AA-99999-99-99-A-99" maxlength="19">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="jobCorp" class="form-label fs-5 m-2">
                            Receiving services from Job Corps
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="jobCorp" id="yjobCorp" value="Yes" required>
                            <label class="form-check-label" for="yjobCorp">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="jobCorp" id="nonJobCorp" value="No">
                            <label class="form-check-label" for="nonJobCorp">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="carlPerkins" class="form-label fs-5 m-2">
                            Receiving services from Vocational Education (Carl Perkins)
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="carlPerkins" id="ycarlPerkins" value="Yes" required>
                            <label class="form-check-label" for="ycarlPerkins">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="carlPerkins" id="nonCarl" value="No">
                            <label class="form-check-label" for="nonCarl">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="tanf" class="form-label fs-5 m-2">
                            Temporary Assistance for Needy Families (TANF) recipient
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="tanf" id="ytanf" value="Yes" required>
                            <label class="form-check-label" for="ytanf">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="tanf" id="nonTANF" value="No">
                            <label class="form-check-label" for="nonTANF">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="ssi" class="form-label fs-5 m-2">
                            Supplemental Security Income (SSI) recipient
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ssi" id="yssi" value="Yes" required>
                            <label class="form-check-label" for="yssi">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ssi" id="nonSSI" value="No">
                            <label class="form-check-label" for="nonSSI">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="generalAssist" class="form-label fs-5 m-2">
                            General Assistance (GA) recipient
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="generalAssist" id="ygeneralAssist" value="Yes" required>
                            <label class="form-check-label" for="ygeneralAssist">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="generalAssist" id="nonGA" value="No">
                            <label class="form-check-label" for="nonGA">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="calFresh" class="form-label fs-5 m-2">
                            Supplemental Nutrition Assistance Program (SNAP) recipient (Cal Fresh)
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="calFresh" id="ycalFresh" value="Yes" required>
                            <label class="form-check-label" for="ycalFresh">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="calFresh" id="nonCalFresh" value="No">
                            <label class="form-check-label" for="nonCalFresh">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="refugeeAssist" class="form-label fs-5 m-2">
                            Refugee Cash Assistance (RCA) recipient
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="refugeeAssist" id="yrefugeeAssist" value="Yes" required>
                            <label class="form-check-label" for="yrefugeeAssist">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="refugeeAssist" id="nonRCA" value="No">
                            <label class="form-check-label" for="nonRCA">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="ssdi" class="form-label fs-5 m-2">
                            Social Security Disability Insurance (SSDI) recipient
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ssdi" id="yssdi" value="Yes" required>
                            <label class="form-check-label" for="yssdi">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="ssdi" id="nonSSDI" value="No">
                            <label class="form-check-label" for="nonSSDI">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="snapTraining" class="form-label fs-5 m-2">
                            Receiving Services under SNAP Employment and Training Program
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="snapTraining" id="ysnapTraining" value="Yes" required>
                            <label class="form-check-label" for="ysnapTraining">
                              Yes
                            </label>
                          </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="snapTraining" id="nonSnapTraining" value="No">
                            <label class="form-check-label" for="nonSnapTrainn">
                              No
                            </label>
                        </div>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                              <label for="pellGrant" class="form-label fs-5 m-2">
                                  Receiving, or has been notified will receive, Pell Grant
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="pellGrant" id="ypellGrant" value="Yes" required>
                                  <label class="form-check-label" for="ypellGrant">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="pellGrant" id="nonPellGrant" value="No">
                                  <label class="form-check-label" for="nonPellGrant">
                                    No
                                  </label>
                              </div>
                    </div>
                    <div class="d-flex justify-content-between m-1">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey4,#survey3" class="btn btn-primary">Back</button>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#survey4,#survey5" class="btn btn-primary">Next</button>
                        
                    </div>
                </div>

                <div id="survey5" style="transition: 1ms" class="collapse">
                          <p class="text-center fs-2">Career Pathways Program</p>
                          <div class="bg-white my-3 border rounded-3">
                              <label for="workTicket" class="form-label fs-5 m-2">
                                  Ticket-to-Work Holder issued by Social Security Administration
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="workTicket" id="yworkTicket" value="Yes" required>
                                  <label class="form-check-label" for="yworkTicket">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="workTicket" id="nonwWorkTicket" value="No">
                                  <label class="form-check-label" for="nonwWorkTicket">
                                    No
                                  </label>
                              </div>
                            </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="homeless" class="form-label fs-5 m-2">
                                  Homeless
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="homeless" id="yhomeless" value="Yes" required>
                                  <label class="form-check-label" for="yhomeless">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="homeless" id="unhomeless" value="No">
                                  <label class="form-check-label" for="unhomeless">
                                      No
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="exOffer" class="form-label fs-5 m-2">
                                  Ex-Offender
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="exOffer" id="yExOffer" value="Yes" required>
                                  <label class="form-check-label" for="yExOffer">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="exOffer" id="nonExOffer" value="No">
                                  <label class="form-check-label" for="nonExOffer">
                                    No
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="displace" class="form-label fs-5 m-2">
                                  Displaced Homemaker
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="displace" id="ydisplace" value="Yes" required>
                                  <label class="form-check-label" for="ydisplace">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="displace" id="nonDisplace" value="No">
                                  <label class="form-check-label" for="nonDisplace">
                                    No
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="singleParent" class="form-label fs-5 m-2">
                                  Single Parent (including single pregnant women)
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="singleParent" id="ysingleParent" value="Yes" required>
                                  <label class="form-check-label" for="ysingleParent">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="singleParent" id="nonSingle" value="No">
                                  <label class="form-check-label" for="nonSingle">
                                    No
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="culBarrier" class="form-label fs-5 m-2">
                                  Cultural Barriers
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="culBarrier" id="yculBarrier" value="Yes" required>
                                  <label class="form-check-label" for="yculBarrier">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="culBarrier" id="noBarrier" value="No">
                                  <label class="form-check-label" for="noBarrier">
                                    No
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="familySize" class="form-label fs-5 m-2">
                                  Family Size
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <input type="number" name="familySize" id="familySize" class="m-2 input-underline" placeholder="Your answer" required>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="annualIncome" class="form-label fs-5 m-2">
                                  Annualized Family Income (last 6 months X2):
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <input type="number" name="annualIncome" id="annualIncome" class="m-2 input-underline" placeholder="Your answer" required>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="techExp" class="form-label fs-5 m-2">
                                  Do you have previous technical experience (hobbies, employment, volunteer, personal projects, home improvement, working on vehicle, taking things apart)? Examples of technical experience include knowing how to read blueprints, using hand tools, using power tools, organizing (logistics), and safety
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="techExp" id="ytechExp" value="Yes" required>
                                  <label class="form-check-label" for="ytechExp">
                                    Yes
                                  </label>
                                </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="techExp" id="nonTechExp" value="No">
                                  <label class="form-check-label" for="nonTechExp">
                                    No
                                  </label>
                              </div>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="techExp" id="notSureTechExp" value="Not Sure">
                                  <label class="form-check-label" for="notSureTechExp">
                                    Not Sure
                                  </label>
                              </div>
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="password" class="form-label fs-5 m-2">
                                  Account Password
                                  <span class="text-danger">*</span>
                              </label>
                              <br>
                              <input type="password" name="password" id="password" oninput="validateEmail()" class="m-2 input-underline" placeholder="Your answer" required>
                          </div>

						  <label id="verification" hidden style="color:red">Password must be 8 characters long including at least one uppercase, lowercase, and special character</label>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="confirmPassword" class="form-label fs-5 m-2">
                                  Confirm Password
                                  <span class="text-danger">*</span>
                              </label>
                              <br>
                              <input type="password" name="confirmPassword" id="confirmPassword" class="m-2 input-underline" placeholder="Your answer" required>
                          </div>

                          <div class="d-flex justify-content-between m-1">
                              <button type="button" data-bs-toggle="collapse" data-bs-target="#survey5,#survey4" class="btn btn-primary">Back</button>
                              <button name="signup-submit" id="signup-submit" type = "submit" class="btn btn-primary">Submit</button>
                              
                          </div>
                    </div>
            </form>
        </div>
    </div>
</body>
