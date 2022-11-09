<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="survey5.php">
                <p class="text-center fs-2">Career Pathways Program</p>
                <div class="bg-white my-3 border rounded-3">
                    <label for="foster" class="form-label fs-5 m-2">
                        Have you been supported through the State's Foster Care System?
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="foster" id="foster">
                        <label class="form-check-label" for="foster">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="foster" id="nonFoster">
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
                        <input class="form-check-input" type="radio" name="adultEdu" id="adultEdu">
                        <label class="form-check-label" for="adultEdu">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="adultEdu" id="nonAdultEdu">
                        <label class="form-check-label" for="nonAdultEdu">
                            Yes
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
                        <input class="form-check-input" type="radio" name="youthBuild" id="youthBuild">
                        <label class="form-check-label" for="youthBuild">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="youthBuild" id="nonYouthBuild">
                        <label class="form-check-label" for="nonYouthBuild">
                          No
                        </label>
                    </div>
                </div>
                
                <div class="bg-white my-3 border rounded-3">
                    <label for="grantNum" class="form-label fs-5 m-2">
                        Youth Build Grant Number                    
                    </label>
                    <br>
                    <input type="text" class="m-2 input-underline" id="grantNum" placeholder="AA-99999-99-99-A-99"
                     maxlength="19">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="jobCorp" class="form-label fs-5 m-2">
                        Receiving services from Job Corps
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="jobCorp" id="jobCorp">
                        <label class="form-check-label" for="youthBuild">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="jobCorp" id="nonJobCorp">
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
                        <input class="form-check-input" type="radio" name="carlPerkins" id="carlPerkins">
                        <label class="form-check-label" for="carlPerkins">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="carlPerkins" id="nonCarl">
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
                        <input class="form-check-input" type="radio" name="tanf" id="tanf">
                        <label class="form-check-label" for="tanf">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="tanf" id="nonTANF">
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
                        <input class="form-check-input" type="radio" name="ssi" id="ssi">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="ssi" id="nonSSI">
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
                        <input class="form-check-input" type="radio" name="generalAssist" id="generalAssist">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="generalAssist" id="nonGA">
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
                        <input class="form-check-input" type="radio" name="calFresh" id="calFresh">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="calFresh" id="nonCalFresh">
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
                        <input class="form-check-input" type="radio" name="refugeeAssist" id="refugeeAssist">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="refugeeAssist" id="nonRCA">
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
                        <input class="form-check-input" type="radio" name="ssdi" id="ssdi">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="ssdi" id="nonSSDI">
                        <label class="form-check-label" for="nonSSDI">
                          No
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="snapTranning" class="form-label fs-5 m-2">
                        Receiving Services under SNAP Employment and Training Program
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="snapTranning" id="snapTranning">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="snapTranning" id="nonSnapTrainn">
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
                        <input class="form-check-input" type="radio" name="pellGrant" id="pellGrant">
                        <label class="form-check-label" for="ssi">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="pellGrant" id="nonPellGrant">
                        <label class="form-check-label" for="nonPellGrant">
                          No
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between m-1">
                    <a href="survey3.php" name="back" id="backBtn" value="back" class="btn btn-primary">Back</a>
                    <input type="submit" name="back" id="NextBtn" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
               
        