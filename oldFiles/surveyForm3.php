<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="survey4.php">
                <p class="text-center fs-2">Career Pathways Program</p>
                <div class="bg-white my-3 border rounded-3">
                    <label for="Military" class="form-label fs-5 m-2">
                        Are you currently in the U.S. Military or a Veteran?
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="military" id="military">
                        <label class="form-check-label" for="military">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="military" id="nonMilitary">
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
                        <input class="form-check-input" type="radio" name="militarySpouse" id="militarySpouse">
                        <label class="form-check-label" for="militarySpouse">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="militarySpouse" id="nonMilitarySpouse">
                        <label class="form-check-label" for="militarySpouse">
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
                        <input class="form-check-input" type="radio" name="employment" id="employment">
                        <label class="form-check-label" for="employment">
                          Employed
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="employment" id="nonEmployment">
                        <label class="form-check-label" for="nonEmployment">
                          Not Employed
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="employment" id="termination">
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
                    <input type="number" class="m-2 input-underline" id="payRate" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="ui" class="form-label fs-5 m-2"><!--ui mean unemployee insurance-->
                        Are you receiving Unemployment Insurance?
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="ui" id="claimant">
                        <label class="form-check-label" for="ui">
                          Claimant
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="ui" id="exhaustee">
                        <label class="form-check-label" for="exhaustee">
                          Exhaustee
                        </label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="ui" id="neither">
                        <label class="form-check-label" for="termination">
                            Neither
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="uiWeek" class="form-label fs-5 m-2">
                        If you are unemployed, how many weeks have you been unemployed?
                    </label>
                    <br>
                    <input type="number" class="m-2 input-underline" id="uiWeek" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="farmworker" class="form-label fs-5 m-2">
                        Have you worked as farmworker in the last 12 months?
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="farmworker" id="farmworker">
                        <label class="form-check-label" for="farmworker">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="farmworker" id="nonFarmworker">
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
                    <input type="text" class="m-2 input-underline" id="jobTitle" placeholder="Your answer">
                </div>

                <div class="d-flex justify-content-between m-1">
                    <a href="survey2.php" name="back" id="backBtn" value="back" class="btn btn-primary">Back</a>
                    <input type="submit" name="back" id="NextBtn" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
               
        