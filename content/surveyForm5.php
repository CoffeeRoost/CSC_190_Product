<body>
    <div class="d-flex justify-content-center my-5">
        <div class="boxSurvey my-1">
            <form action="Login.php">
                <p class="text-center fs-2">Career Pathways Program</p>
                <div class="bg-white my-3 border rounded-3">
                    <label for="workTicket" class="form-label fs-5 m-2">
                        Ticket-to-Work Holder issued by Social Security Administration
                    </label>
                    <span class="text-danger">*</span>
                    <br>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="workTicket" id="workTicket">
                        <label class="form-check-label" for="workTicket">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="workTicket" id="nonwWorkTicket">
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
                        <input class="form-check-input" type="radio" name="homeless" id="homeless">
                        <label class="form-check-label" for="homeless">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="homeless" id="unhomeless">
                        <label class="form-check-label" for="unhomeless">
                            Yes
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
                        <input class="form-check-input" type="radio" name="exOffer" id="exOffer">
                        <label class="form-check-label" for="exOffer">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="exOffer" id="nonExOffer">
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
                        <input class="form-check-input" type="radio" name="displace" id="displace">
                        <label class="form-check-label" for="displace">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="displace" id="nonDisplace">
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
                        <input class="form-check-input" type="radio" name="singleParent" id="singleParent">
                        <label class="form-check-label" for="singleParent">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="singleParent" id="nonSingle">
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
                        <input class="form-check-input" type="radio" name="culBarrier" id="culBarrier">
                        <label class="form-check-label" for="culBarrier">
                          Yes
                        </label>
                      </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="radio" name="culBarrier" id="noBarrier">
                        <label class="form-check-label" for="noBarrier">
                          No
                        </label>
                    </div>
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="familySize" class="form-label fs-5 m-2">
                        Family Size
                    </label>
                    <br>
                    <input type="number" class="m-2 input-underline" id="familySize" placeholder="Your answer">
                </div>

                <div class="bg-white my-3 border rounded-3">
                    <label for="annuaIncome" class="form-label fs-5 m-2">
                        Annualized Family Income (last 6 months X2):
                    </label>
                    <br>
                    <input type="number" class="m-2 input-underline" id="annuaIncome" placeholder="Your answer">
                </div>
                <div class="d-flex justify-content-between m-1">
                    <a href="survey4.php" name="back" id="backBtn" value="back" class="btn btn-primary">Back</a>
                    <input type="submit" name="back" id="NextBtn" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
               
        