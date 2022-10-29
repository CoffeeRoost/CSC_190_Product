<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="survey3.php">
                <p class="text-center fs-2">Career Pathways Program</p>
                <div class="bg-white my-3 border rounded-3">
                    <label for="citizenship" class="form-label fs-5 m-2">
                        US Citizenship Status
                        <span class="text-danger">*</span>
                    </label><br>
                    <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship">
                        <option selected>Choose</option>
                        <option value="citizen">Citizen of US or US Territory</option>
                        <option value="greenCard">US Permanent Resident</option>
                        <option value="alien">Alien/Refugee Lawfully Admitted to the US</option>
                        <option value="noneCitizen">None of the above</option>
                    </select>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="uscis" class="form-label fs-5 m-2">
                        If a U.S. Permanent Resident or an Alien/Refugee lawfully admitted to the U.S., please provide your:
                    </label>
                    <br>
                    <input type="number" class="m-2 input-underline" id="uscisNumber" placeholder="Alien Registration Number">
                    <label for="uscis" class="form-label m-2">
                        Expired Date
                    </label>
                    <input type="date" class="m-2 input-underline" id="uscisExpired">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="selective" class="form-label fs-5 m-2">
                        Have you registered with the Selective Service? Only applicable for men ages 18 to 25
                    </label>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="selective" id="selective">
                        <label class="form-check-label" for="selective">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="selective" id="nonSelective">
                        <label class="form-check-label" for="nonSelective">
                          No
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="selective" id="docExemption">
                        <label class="form-check-label" for="docExemption">
                          Documented exemption
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="selective" id="notApplicable">
                        <label class="form-check-label" for="notApplicable">
                          Not applicable
                        </label>
                    </div>
                </div>
                <div class="bg-white my-3 border rounded-3">
                    <label for="Hispanic" class="form-label fs-5 m-2">
                        Hispanic/Latino Heritage
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="hispanic" id="hispanic">
                        <label class="form-check-label" for="selective">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="hispanic" id="nonhispanic">
                        <label class="form-check-label" for="nonSelective">
                          No
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="race" class="form-label fs-5 m-2">
                        Race (Ethnicity) check all that apply
                        <span class="text-danger">*</span>
                    </label><br>
                    <select class="form-select-SM m-2 border rounded-2" name="race" id="race">
                        <option selected>Choose</option>
                        <option value="black">African American/Black</option>
                        <option value="native">American Indian/Alaskan Native</option>
                        <option value="asian">Asian</option>
                        <option value="islander">Hawaiian/Other Pacific Islander</option>
                        <option value="white">White</option>
                        <option value="notAnswer">I do not wish to answer</option>
                    </select>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="language" class="form-label fs-5 m-2">
                        What is your primary language?
                        <span class="text-danger">*</span>
                    </label><br>
                    <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                        <option selected>Choose</option>
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
                        <input class="form-check-input" type="radio" name="proficiency" id="proficiency">
                        <label class="form-check-label" for="proficiency">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="proficiency" id="nonProficiency">
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
                        <input class="form-check-input" type="radio" name="disability" id="disability">
                        <label class="form-check-label" for="disability">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="disability" id="nonDisability">
                        <label class="form-check-label" for="nonDisability">
                          No
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="address" class="form-label fs-5 m-2">
                        Please use the following space to indicate your disability.
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="typeDisability" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="schoolLevel" class="form-label fs-5 m-2">
                        Highest school grade completed?
                        <span class="text-danger">*</span>
                    </label><br>
                    <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel">
                        <option selected>Choose</option>
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
                        <input class="form-check-input" type="radio" name="diploma" id="diploma">
                        <label class="form-check-label" for="diploma">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="diploma" id="nonDiploma">
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
                    <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool">
                        <option selected>Choose</option>
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
                        <input class="form-check-input" type="radio" name="schoolStatus" id="schoolStatus">
                        <label class="form-check-label" for="inSchool">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="schoolStatus" id="schoolStatus">
                        <label class="form-check-label" for="notInschool">
                          No
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-between m-1">
                    <a href="survey1.php" name="back" id="backBtn" value="back" class="btn btn-primary">Back</a>
                    <input type="submit" name="back" id="NextBtn" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>