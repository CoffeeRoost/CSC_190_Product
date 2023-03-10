<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="/CSC_190_Product/includes/newAccount.inc.php" method="post">
		           <div id="survey1" style="transition: 1ms" class="collapse show">
                  <p class="text-center fs-2">Career Pathways Program</p>
                  <div class="bg-white my-3 border rounded-3">
                      <label for="partner-organization" class="form-label fs-5 m-2">
                          Who referred you to our program or what partner organization are you from?
                          <span class="text-danger">*</span>
                      </label>
                        <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner">
                            <option value="" disabled selected hidden>Choose</option>
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
                        <label for="fname" class="form-label fs-5 m-2">
                            First Name
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="fname" id="fname" class="m-2 input-underline" placeholder="Your answer" >
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
                        <input type="text" name="lname" id="lname" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="SSN" class="form-label fs-5 m-2">
                            Last four numbers of your Social Security Number
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="SSN" id="SSN" class="m-2 input-underline" placeholder="Your answer"
                        maxlength="4">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="street" class="form-label fs-5 m-2">
                            Address: Street & Number
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="street" id="street" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="city" class="form-label fs-5 m-2">
                            Address: City
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="city" id="city" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="state" class="form-label fs-5 m-2">
                            Address: State
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="state" id="state" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="zip" class="form-label fs-5 m-2">
                            Address: Zip Code
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="zip" id="zip" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="county" class="form-label fs-5 m-2">
                            Address: County
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="county" id="county" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="sameAdd" class="form-label fs-5 m-2">
                            Is your mailing address information the same as your address information above?
                        </label>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sameAdd" id="ysameAdd" value="Yes">
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
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="mailStreet" id="mailStreet" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailCity" class="form-label fs-5 m-2">
                            Mailing Address: City
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="mailCity" id="mailCity" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailState" class="form-label fs-5 m-2">
                            Mailing Address: State
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="mailState" id="mailState" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                        <label for="mailZip" class="form-label fs-5 m-2">
                            Mailing Address: Zip Code
                            <span class="text-danger">*</span>
                        </label>
                        <br>
                        <input type="text" name="mailZip" id="mailZip" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="mailCounty" class="form-label fs-5 m-2">
                              Mailing Address: County
                              <span class="text-danger">*</span>
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
                          <input type="phone" name="phone" id="phone" class="m-2 input-underline" placeholder="Your answer" >
                          <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType" >
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
                          <input type="phone" name="alPhone" id="alPhone" class="m-2 input-underline" placeholder="Your answer">
                  </div>

                      <div class="bg-white my-3 border rounded-3">
                          <label for="email" class="form-label fs-5 m-2">
                              Primary Email
                          </label>
                          <span class="text-danger">*</span>
                          <br>
                          <input type="email" name="email" id="email" class="m-2 input-underline" placeholder="Your answer" >
                  </div>

                      <div class="bg-white my-3 border rounded-3">
                          <label for="bthday" class="form-label fs-5 m-2">
                              Birthday
                          </label>
                          <span class="text-danger">*</span>
                          <br>
                          <input type="date" name="bthday" id="bthday" class="m-2 input-underline">
                  </div>

                  <div class="bg-white my-3 border rounded-3">
                          <label for="gender" class="form-label fs-5 m-2">
                              Gender
                          </label>
                        <span class="text-danger">*</span>
                          <br>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                              <label class="form-check-label" for="male">
                                Male
                              </label>
                            </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                              <label class="form-check-label" for="female">
                                Female
                              </label>
                          </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay">
                              <label class="form-check-label" for="notSay">
                                Prefer not to say
                              </label>
                          </div>
                          <div class="form-check m-2">
                              <input class="form-check-input" type="radio" name="gender" id="other" value="other">
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
                        <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship" >
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="citizen">Citizen of US or US Territory</option>
                            <option value="greenCard">US Permanent Resident</option>
                            <option value="alien">Alien/Refugee Lawfully Admitted to the US</option>
                            <option value="noneCitizen">None of the above</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="uscisNumber" class="form-label fs-5 m-2">
                            If a U.S. Permanent Resident or an Alien/Refugee lawfully admitted to the U.S., please provide your:
                        </label>
                        <br>
                        <input type="number" name="uscisNumber" id="uscisNumber" class="m-2 input-underline" placeholder="Alien Registration Number">
                        <label for="uscisExpired" class="form-label m-2">
                            Expired Date
                        </label>
                        <input type="date" id="uscisExpired" name="uscisExpired" class="m-2 input-underline">
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="selective" class="form-label fs-5 m-2">
                            Have you registered with the Selective Service? Only applicable for men ages 18 to 25
                        </label>
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
                            <input class="form-check-input" type="radio" name="selective" id="notApplicable" value="Not applicable">
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
                            <input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes">
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
                        </label><br>
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
                        <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="eng">English</option>
                            <option value="span">Spanish</option>
                            <option value="dari">Dari</option>
                            <option value="pashto">Pashto</option>
                            <option value="rus">Russian</option>
                            <option value="viet">Vietnamese</option>
                            <option value="mandarin">Mandarin</option>
                            <option value="arabic">Arabic</option>
                            <option value="farsi">Farsi</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="proficiency" class="form-label fs-5 m-2">
                            Do you have limited proficiency in speaking, writing, reading, or understanding English?
                            or Do you have difficulty in speaking, writing, reading, or understanding English?
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
                            <input class="form-check-input" type="radio" name="disability" id="ydisability" value="Yes">
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
                        <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel" >
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
                            <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes">
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
                        <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool" >
                            <option value="" disabled selected hidden>Choose</option>
                            <option value="highschool">High School Diploma</option>
                            <option value="ged">High School Equivalent Diploma (GED)</option>
                            <option value="certificate">Certificate of Attendance/Completion (Disabled Individuales)</option>
                            <option value="schoolCertificate">Vocational School Certificate</option>
                            <option value="technical">Colllege or Technical or Vocational School</option>
                            <option value="aa">AA</option>
                            <option value="baAndbs">BA/BS</option>
                            <option value="master">Master's Degree</option>
                            <option value="doctor">Doctorate Degree</option>
                        </select>
                    </div>

                    <div class="bg-white my-3 border rounded-3">
                        <label for="schoolStatus" class="form-label fs-5 m-2">
                            School Status
                        </label>
                        <span class="text-danger">*</span>
                        <br>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes">
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
                            <input class="form-check-input" type="radio" name="military" id="ymilitary" value="Yes">
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
                            <input class="form-check-input" type="radio" name="militarySpouse" id="ymilitarySpouse" value="Yes">
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
                            <input class="form-check-input" type="radio" name="employment" id="yemployment" value="Employed">
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
                            <input class="form-check-input" type="radio" name="ui" id="neither" value="Neither">
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
                            <input class="form-check-input" type="radio" name="farmworker" id="yfarmworker" value="Yes">
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
                        <input type="text" name="jobTitle" id="jobTitle" class="m-2 input-underline" placeholder="Your answer">
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
                            <input class="form-check-input" type="radio" name="foster" id="yfoster" value="Yes">
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
                            <input class="form-check-input" type="radio" name="adultEdu" id="yadultEdu" value="Yes">
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
                            <input class="form-check-input" type="radio" name="youthBuild" id="yyouthBuild" value="Yes">
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
                            <input class="form-check-input" type="radio" name="jobCorp" id="yjobCorp" value="Yes" >
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
                            <input class="form-check-input" type="radio" name="carlPerkins" id="ycarlPerkins" value="Yes">
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
                            <input class="form-check-input" type="radio" name="tanf" id="ytanf" value="Yes">
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
                            <input class="form-check-input" type="radio" name="ssi" id="yssi" value="Yes">
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
                            <input class="form-check-input" type="radio" name="generalAssist" id="ygeneralAssist" value="Yes">
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
                            <input class="form-check-input" type="radio" name="calFresh" id="ycalFresh" value="Yes">
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
                            <input class="form-check-input" type="radio" name="refugeeAssist" id="yrefugeeAssist" value="Yes">
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
                            <input class="form-check-input" type="radio" name="ssdi" id="yssdi" value="Yes">
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
                            <input class="form-check-input" type="radio" name="snapTraining" id="ysnapTraining" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="pellGrant" id="ypellGrant" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="workTicket" id="yworkTicket" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="homeless" id="yhomeless" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="exOffer" id="yExOffer" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="displace" id="ydisplace" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="singleParent" id="ysingleParent" value="Yes">
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
                                  <input class="form-check-input" type="radio" name="culBarrier" id="yculBarrier" value="Yes">
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
                              <input type="number" name="familySize" id="familySize" class="m-2 input-underline" placeholder="Your answer">
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="annualIncome" class="form-label fs-5 m-2">
                                  Annualized Family Income (last 6 months X2):
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <input type="number" name="annualIncome" id="annualIncome" class="m-2 input-underline" placeholder="Your answer">
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="techExp" class="form-label fs-5 m-2">
                                  Do you have previous technical experience (hobbies, employment, volunteer, personal projects, home improvement, working on vehicle, taking things apart)? Examples of technical experience include knowing how to read blueprints, using hand tools, using power tools, organizing (logistics), and safety
                              </label>
                              <span class="text-danger">*</span>
                              <br>
                              <div class="form-check m-2">
                                  <input class="form-check-input" type="radio" name="techExp" id="ytechExp" value="Yes">
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
                              <input type="password" name="password" id="password" class="m-2 input-underline" placeholder="Your answer">
                          </div>

                          <div class="bg-white my-3 border rounded-3">
                              <label for="confirmPassword" class="form-label fs-5 m-2">
                                  Confirm Password
                                  <span class="text-danger">*</span>
                              </label>
                              <br>
                              <input type="password" name="confirmPassword" id="confirmPassword" class="m-2 input-underline" placeholder="Your answer">
                          </div>

                          <div class="d-flex justify-content-between m-1">
                              <button type="button" data-bs-toggle="collapse" data-bs-target="#survey5,#survey4" class="btn btn-primary">Back</button>
                              <button name="signup-submit" type = "submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>
            </form>
        </div>
    </div>
</body>