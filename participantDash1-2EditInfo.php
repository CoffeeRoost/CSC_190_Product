<div class="container-fluid">
    <!--Demographic Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Demographic Information</legend>
                <div id ="userDemoInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">First Name</div>
                        <div class="col-7"><?php echo $fname?></div>

                        <!--Edit Demographic Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userDemoInfoShow,#userDemoInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <!--Middle name can be null-->
                        <div class="col-4 fw-bold">Middle Name</div>
                        <div class="col-7"><?php if ($mname) { ?><?php echo $mname?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Last Name</div>
                        <div class="col-7"><?php echo $lname?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Date of Birth</div>
                        <div class="col-7"><?php echo $DOB?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Gender</div>
                        <div class="col-7">
                            <?php   if ($gender=='male')        { ?><?php echo 'Male'?>
                            <?php } else if ($gender=='female') { ?><?php echo 'Female'?>
                            <?php } else if ($gender=='notSay') { ?><?php echo 'Prefer Not to Say'?>
                            <?php } else { ?><?php echo $gender?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">SSN</div>
                        <div class="col-7"><?php echo $last4SSN?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Partner Organization</div>
                        <div class="col-7">
                            <?php if ($programPartnerReference=='friend&fam') { ?>
                            <option value="friend&fam" selected>Friend and Family</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Hiring_event') { ?>
                            <option value="Hiring_event" selected>Hiring Event or Career Fair</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Women_Emp') { ?>
                            <option value="Women_Emp" selected>Women's Empowerment</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='NextMove') { ?>
                            <option value="NextMove" selected>Next Move</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Waking_Village') { ?>
                            <option value="Waking_Village" selected>Waking the Village</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='SaintJ') { ?>
                            <option value="SaintJ" selected>Saint John's</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='LaFam') { ?>
                            <option value="LaFam" selected>La Familia</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='GSU') { ?>
                            <option value="GSU" selected>GS Urban League</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='AsianRe') { ?>
                            <option value="AsianRe" selected>Asian Resources</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='FolsomCP') { ?>
                            <option value="FolsomCP" selected>Folsom Cordova CP</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='LemonH') { ?>
                            <option value="LemonH" selected>Lemon Hill</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='SacJ') { ?>
                            <option value="SacJ" selected>Sac Job Corp</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='Public') { ?>
                            <option value="Public" selected>Public/Aura Planning</option>
                            <?php } ?>
                            <?php if ($programPartnerReference=='International') { ?>
                            <option value="International" selected>International Rescue Committee Sacramento</option>
                            <?php } ?>
                        </div>
                    </div>
                </div>
    
                <div id ="userDemoInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2DemographicInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">First Name</div>
                            <div class="col-7">
                                <input type="text" name="fname" class="col input-underline" value ="<?php echo $fname?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userDemoInfoEdit,#userDemoInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Middle Name</div>
                            <div class="col-7">
                                <?php if ($mname) { ?>
                                    <input type="text" name="mname" class="col input-underline" value ="<?php echo $mname?>">
                                <?php } else { ?>
                                    <input type="text" name="mname" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Last Name</div>
                            <div class="col-7">
                                <input type="text" name="lname" class="col input-underline" value ="<?php echo $lname?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Date of Birth</div>
                            <div class="col-7">
                                <input type="date" name="bthday" class="col input-underline" value ="<?php echo $DOB?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Gender</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($gender=='male') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <?php } ?>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender=='female') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <?php } ?>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender=='notSay') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="notSay" value="notSay">
                                    <?php } ?>
                                    <label class="form-check-label" for="notSay">Prefer Not to Say</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($gender!='male' && $gender!='female' && $gender!='notSay') { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                    <?php } ?>
                                    <label class="form-check-label" for="other">
                                        Other
                                    </label>
                                    <?php if ($gender!='male' && $gender!='female' && $gender!='notSay') { ?>
                                        <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" value="<?php echo $gender?>">
                                    <?php } else { ?>
                                        <input type="text" name="otherAns" id="otherAns" class="m-2 input-underline" placeholder="Your answer">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">SSN</div>
                            <div class="col-7">
                            <input type="text" name="SSN" id="SSN" class="m-2 input-underline" value="<?php echo $last4SSN?>" maxlength="4">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Partner Organization</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="partner" id="partner">
                                    <?php if ($programPartnerReference=='friend&fam') { ?>
                                    <option value="friend&fam" selected>Friend and Family</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Hiring_event') { ?>
                                    <option value="Hiring_event" selected>Hiring Event or Career Fair</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Women_Emp') { ?>
                                    <option value="Women_Emp" selected>Women's Empowerment</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='NextMove') { ?>
                                    <option value="NextMove" selected>Next Move</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Waking_Village') { ?>
                                    <option value="Waking_Village" selected>Waking the Village</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='SaintJ') { ?>
                                    <option value="SaintJ" selected>Saint John's</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='LaFam') { ?>
                                    <option value="LaFam" selected>La Familia</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='GSU') { ?>
                                    <option value="GSU" selected>GS Urban League</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='AsianRe') { ?>
                                    <option value="AsianRe" selected>Asian Resources</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='FolsomCP') { ?>
                                    <option value="FolsomCP" selected>Folsom Cordova CP</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='LemonH') { ?>
                                    <option value="LemonH" selected>Lemon Hill</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='SacJ') { ?>
                                    <option value="SacJ" selected>Sac Job Corp</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='Public') { ?>
                                    <option value="Public" selected>Public/Aura Planning</option>
                                    <?php } ?>
                                    <?php if ($programPartnerReference=='International') { ?>
                                    <option value="International" selected>International Rescue Committee Sacramento</option>
                                    <?php } ?>

                                    <option value="friend&fam">Friend and Family</option>
                                    <option value="Hiring_event">Hiring Event or Career Fair</option>
                                    <option value="Women_Emp">Women's Empowerment</option>
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
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Address Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Address Information</legend>
                <div id ="userAddressInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Street</div>
                        <div class="col-7"><?php echo $street?></div>

                        <!--Edit Address Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userAddressInfoShow,#userAddressInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address City</div>
                        <div class="col-7"><?php echo $city?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address State</div>
                        <div class="col-7"><?php echo $state?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Zipcode</div>
                        <div class="col-7"><?php echo $zipcode?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Address Country</div>
                        <div class="col-7"><?php echo $country?></div>
                    </div>

                    <!--Mailing Address-->
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Street</div>
                        <div class="col-7"><?php if ($mailingStreet) { ?><?php echo $mailingStreet?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address City</div>
                        <div class="col-7"><?php if ($mailingCity) { ?><?php echo $mailingCity?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address State</div>
                        <div class="col-7"><?php if ($mailingState) { ?><?php echo $mailingState?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Zipcode</div>
                        <div class="col-7"><?php if ($mailingZipcode) { ?><?php echo $mailingZipcode?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Mailing Address Country</div>
                        <div class="col-7"><?php if ($mailingCountry) { ?><?php echo $mailingCountry?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>
                </div>
    
                <div id ="userAddressInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2AddressInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Street</div>
                            <div class="col-7">
                                <input type="text" name="street" class="col input-underline" value ="<?php echo $street?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userAddressInfoEdit,#userAddressInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address City</div>
                            <div class="col-7">
                                <input type="text" name="city" class="col input-underline" value ="<?php echo $city?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address State</div>
                            <div class="col-7">
                                <input type="text" name="state" class="col input-underline" value ="<?php echo $state?>">
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Zipcode</div>
                            <div class="col-7">
                                <input type="text" name="zip" class="col input-underline" value ="<?php echo $zipcode?>">
                            </div>
                        </div>
                        
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Address Country</div>
                            <div class="col-7">
                                <input type="text" name="county" class="col input-underline" value ="<?php echo $country?>">
                            </div>
                        </div>

                        <!--Mailing Address-->
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Street</div>
                            <div class="col-7">
                                <?php if ($mailingStreet) { ?>
                                    <input type="text" name="mailStreet" class="col input-underline" value="<?php echo $mailingStreet?>">
                                <?php } else { ?>
                                    <input type="text" name="mailStreet" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address City</div>
                            <div class="col-7">
                                <?php if ($mailingCity) { ?>
                                    <input type="text" name="mailCity" class="col input-underline" value="<?php echo $mailingCity?>">
                                <?php } else { ?>
                                    <input type="text" name="mailCity" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address State</div>
                            <div class="col-7">
                                <?php if ($mailingCountry) { ?>
                                    <input type="text" name="mailState" class="col input-underline" value="<?php echo $mailingCountry?>">
                                <?php } else { ?>
                                    <input type="text" name="mailState" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Zipcode</div>
                            <div class="col-7">
                                <?php if ($mailingZipcode) { ?>
                                    <input type="text" name="mailZip" class="col input-underline" value="<?php echo $mailingZipcode?>">
                                <?php } else { ?>
                                    <input type="text" name="mailZip" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Mailing Address Country</div>
                            <div class="col-7">
                                <?php if ($mailingCountry) { ?>
                                    <input type="text" name="mailCounty" class="col input-underline" value="<?php echo $mailingCountry?>">
                                <?php } else { ?>
                                    <input type="text" name="mailCounty" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Contact Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Contact Information</legend>
                <div id ="userContactInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Phone Number</div>
                        <div class="col-7"><?php echo $primaryPhone?></div>

                        <!--Edit Contact Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userContactInfoShow,#userContactInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Phone Type</div>
                        <div class="col-7">
                            <?php if ($phoneNumType=='cellphone')      { ?><?php echo 'Cell Phone'?><?php } ?>
                            <?php if ($phoneNumType=='homePhone')      { ?><?php echo 'Home Phone'?><?php } ?>
                            <?php if ($phoneNumType=='relativesPhone') { ?><?php echo 'Relatives Phone'?><?php } ?>
                            <?php if ($phoneNumType=='workphone')      { ?><?php echo 'Work Phone'?><?php } ?>
                            <?php if ($phoneNumType=='otherphone')     { ?><?php echo 'Other'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Alternative Phone Number</div>
                        <div class="col-7"><?php if ($altPhone) { ?><?php echo $altPhone?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Email</div>
                        <div class="col-7"><?php echo $email?></div>
                    </div>
                </div>
    
                <div id ="userContactInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2ContactInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Phone Number</div>
                            <div class="col-7">
                                <input type="phone" name="phone" class="col input-underline" value ="<?php echo $primaryPhone?>">
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userContactInfoEdit,#userContactInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Phone Type</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="phoneType" id="phoneType" >
                                    <?php if ($phoneNumType=='cellphone')      { ?><option value="cellphone" selected>Cell Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='homePhone')      { ?><option value="homePhone" selected>Home Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='relativesPhone') { ?><option value="relativesPhone" selected>Relatives Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='workphone')      { ?><option value="workphone" selected>Work Phone</option><?php } ?>
                                    <?php if ($phoneNumType=='otherphone')     { ?><option value="otherphone" selected>Other</option><?php } ?>

                                    <option value="cellphone">Cell Phone</option>
                                    <option value="homePhone">Home Phone</option>
                                    <option value="relativesPhone">Relatives Phone</option>
                                    <option value="workphone">Work Phone</option>
                                    <option value="otherphone">Other</option>
                                </select>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Alternative Phone Number</div>
                            <div class="col-7">
                                <?php if ($altPhone) { ?>
                                    <input type="phone" name="alPhone" class="col input-underline" value="<?php echo $altPhone?>">
                                <?php } else { ?>
                                    <input type="phone" name="alPhone" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Email</div>
                            <div class="col-7">
                                <input type="email" name="email" class="col input-underline" value="<?php echo $email?>">
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Citizenship Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Citizenship Information</legend>
                <div id ="userCitizenshipInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">US Citizenship Status</div>
                        <div class="col-7">
                            <?php if ($usCitizenshipStatus=='citizen')     { ?><?php echo 'Citizen of US or US Territory'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='greenCard')   { ?><?php echo 'US Permanent Resident'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='alien')       { ?><?php echo 'Alien/Refugee Lawfully Admitted to the US'?><?php } ?>
                            <?php if ($usCitizenshipStatus=='noneCitizen') { ?><?php echo 'None of the above'?><?php } ?>
                        </div>

                        <!--Edit Citizenship Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userCitizenshipInfoShow,#userCitizenshipInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Alien Registration Code</div>
                        <div class="col-7"><?php if ($usCitizenshipStatus=='alien') { ?><?php echo $alienRegistrationCode?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Expired Date</div>
                        <div class="col-7"><?php if ($usCitizenshipStatus=='alien') { ?><?php echo $alienRegistrationCodeEXP?><?php } else { ?><?php echo 'N/A'?><?php } ?></div>
                    </div>
                </div>
    
                <div id ="userCitizenshipInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2CitizenshipInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">US Citizenship Status</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="citizenship" id="citizenship" >
                                    <?php if ($usCitizenshipStatus=='citizen')     { ?><option value="citizen" selected>Citizen of US or US Territory</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='greenCard')   { ?><option value="greenCard" selected>US Permanent Resident</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='alien')       { ?><option value="alien" selected>Alien/Refugee Lawfully Admitted to the US</option><?php } ?>
                                    <?php if ($usCitizenshipStatus=='noneCitizen') { ?><option value="noneCitizen" selected>None of the above</option><?php } ?>

                                    <option value="citizen">Citizen of US or US Territory</option>
                                    <option value="greenCard">US Permanent Resident</option>
                                    <option value="alien">Alien/Refugee Lawfully Admitted to the US</option>
                                    <option value="noneCitizen">None of the above</option>
                                </select>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userCitizenshipInfoEdit,#userCitizenshipInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Alien Registration Code</div>
                            <div class="col-7">
                                <?php if ($usCitizenshipStatus=='alien') { ?>
                                    <input type="number" name="uscisNumber" class="col input-underline" value="<?php echo $alienRegistrationCode?>">
                                <?php } else { ?>
                                    <input type="number" name="uscisNumber" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Expired Date</div>
                            <div class="col-7">
                                <?php if ($usCitizenshipStatus=='alien') { ?>
                                    <input type="date" name="uscisExpired" class="col input-underline" value="<?php echo $alienRegistrationCodeEXP?>">
                                <?php } else { ?>
                                    <input type="date" name="uscisExpired" class="col input-underline" placeholder="Your Answer">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Education Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Education Information</legend>
                <div id ="userEducationInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                        <div class="col-7">
                            <?php if ($highSchoolStatus=='9th')  { ?><?php echo '9th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='10th') { ?><?php echo '10th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='11th') { ?><?php echo '11th grade'?><?php } ?>
                            <?php if ($highSchoolStatus=='12th') { ?><?php echo '12th grade'?><?php } ?>
                        </div>

                        <!--Edit Citizenship Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEducationInfoShow,#userEducationInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                        <div class="col-7"><?php if ($highSchooolDiplomaOrEquil=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Highest School Grade Completed</div>
                        <div class="col-7">
                            <?php if ($highestGradeComplete=='highschool')        { ?><?php echo 'High School Diploma'?><?php } ?>
                            <?php if ($highestGradeComplete=='ged')               { ?><?php echo 'High School Equivalent Diploma (GED)'?><?php } ?>
                            <?php if ($highestGradeComplete=='certificate')       { ?><?php echo 'Certificate of Attendance/Completion (Disabled Individuales)'?><?php } ?>
                            <?php if ($highestGradeComplete=='schoolCertificate') { ?><?php echo 'Vocational School Certificate'?><?php } ?>
                            <?php if ($highestGradeComplete=='technical')         { ?><?php echo 'Colllege or Technical or Vocational School'?><?php } ?>
                            <?php if ($highestGradeComplete=='aa')                { ?><?php echo 'AA'?><?php } ?>
                            <?php if ($highestGradeComplete=='baAndbs')           { ?><?php echo 'BA/BS'?><?php } ?>
                            <?php if ($highestGradeComplete=='master')            { ?><?php echo "Master's Degree"?><?php } ?>
                            <?php if ($highestGradeComplete=='doctor')            { ?><?php echo 'Doctorate Degree'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">School Status</div>
                        <div class="col-7"><?php if ($inSchool=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>
                </div>
    
                <div id ="userEducationInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2EducationInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Highest School Grade Completed</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="schoolLevel" id="schoolLevel">
                                    <?php if ($highSchoolStatus=='9th')  { ?><option value="9th" selected>9th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='10th') { ?><option value="10th" selected>10th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='11th') { ?><option value="11th" selected>11th grade</option><?php } ?>
                                    <?php if ($highSchoolStatus=='12th') { ?><option value="12th" selected>12th grade</option><?php } ?>

                                    <option value="9th">9th grade</option>
                                    <option value="10th">10th grade</option>
                                    <option value="11th">11th grade</option>
                                    <option value="12th">12th grade</option>
                                </select>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEducationInfoEdit,#userEducationInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($highSchooolDiplomaOrEquil=='Yes') { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="ydiploma" value="Yes">
                                    <?php } ?>
                                    <label class="form-check-label" for="ydiploma">Yes</label>
                                </div>
                                <div class="form-check m-2">
                                    <?php if ($highSchooolDiplomaOrEquil=='No') { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No" checked="checked">
                                    <?php } else { ?>
                                        <input class="form-check-input" type="radio" name="diploma" id="nonDiploma" value="No">
                                    <?php } ?>
                                    <label class="form-check-label" for="nonDiploma">No</label>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Highest School Grade Completed</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="highestSchool" id="highestSchool">
                                    <?php if ($highestGradeComplete=='highschool')        { ?><option value="highschool" selected>High School Diploma</option><?php } ?>
                                    <?php if ($highestGradeComplete=='ged')               { ?><option value="ged" selected>High School Equivalent Diploma (GED)</option><?php } ?>
                                    <?php if ($highestGradeComplete=='certificate')       { ?><option value="certificate" selected>Certificate of Attendance/Completion (Disabled Individuales)</option><?php } ?>
                                    <?php if ($highestGradeComplete=='schoolCertificate') { ?><option value="schoolCertificate" selected>Vocational School Certificate</option><?php } ?>
                                    <?php if ($highestGradeComplete=='technical')         { ?><option value="technical" selected>Colllege or Technical or Vocational School</option><?php } ?>
                                    <?php if ($highestGradeComplete=='aa')                { ?><option value="aa" selected>AA</option><?php } ?>
                                    <?php if ($highestGradeComplete=='baAndbs')           { ?><option value="baAndbs" selected>BA/BS</option><?php } ?>
                                    <?php if ($highestGradeComplete=='master')            { ?><option value="master" selected>Master's Degree</option><?php } ?>
                                    <?php if ($highestGradeComplete=='doctor')            { ?><option value="doctor" selected>Doctorate Degree</option><?php } ?>

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
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">High School Diploma or Equivalent Received</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($inSchool=='Yes') { ?>
                                        <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes" checked="checked">
                                    <?php } else { ?>
                                    <label class="form-check-label" for="inSchool">
                                        <input class="form-check-input" type="radio" name="schoolStatus" id="inSchool" value="Yes">
                                    <?php } ?>
                                    Yes
                                    </label>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($inSchool=='No') { ?>
                                        <input class="form-check-input" type="radio" name="schoolStatus" id="notInschool" value="No" checked="checked">
                                    <?php } else { ?>
                                    <label class="form-check-label" for="notInschool">
                                        <input class="form-check-input" type="radio" name="schoolStatus" id="notInschool" value="No">
                                    <?php } ?>
                                    No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>

    <!--Ethnicity Information Section (Display and Edit)-->
    <div class="mb-5">
        <fieldset class="border rounded-3 p-3">
            <legend class="float-none w-auto px-3">Ethnicity Information</legend>
                <div id ="userEthnicityInfoShow" style="transition:1ms;" class ="collapse show">
                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Hispanic/Latino Heritage</div>
                        <div class="col-7"><?php if ($hispanicHeritage=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>

                        <!--Edit Ethnicity Information Section Button-->
                        <div class="col-1 text-end">
                            <a href="#" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEthnicityInfoShow,#userEthnicityInfoEdit">Edit</a>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Race</div>
                        <div class="col-7">
                            <?php   if ($africanAmercian_black=='Yes')        { ?><?php echo 'African American/Black<br>'?>
                            <?php } if ($americanIndian_alaskanNative=='Yes') { ?><?php echo 'American Indian/Alaskan Native<br>'?>
                            <?php } if ($asian=='Yes')                        { ?><?php echo 'Asian<br>'?>
                            <?php } if ($hawaiian_other=='Yes')               { ?><?php echo 'Hawaiian/Other Pacific Islander<br>'?>
                            <?php } if ($white=='Yes')                        { ?><?php echo 'White<br>'?>
                            <?php } if ($noAnswer=='Yes')                     { ?><?php echo 'I do not wish to answer<br>'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">Primary Language</div>
                        <div class="col-7">
                            <?php   if ($primaryLanguage=='eng')      { ?><?php echo 'English'?>
                            <?php } if ($primaryLanguage=='span')     { ?><?php echo 'Spanish'?>
                            <?php } if ($primaryLanguage=='dari')     { ?><?php echo 'Dari'?>
                            <?php } if ($primaryLanguage=='pashto')   { ?><?php echo 'Pashto'?>
                            <?php } if ($primaryLanguage=='rus')      { ?><?php echo 'Russian'?>
                            <?php } if ($primaryLanguage=='viet')     { ?><?php echo 'Vietnamese'?>
                            <?php } if ($primaryLanguage=='mandarin') { ?><?php echo 'Mandarin'?>
                            <?php } if ($primaryLanguage=='arabic')   { ?><?php echo 'Arabic'?>
                            <?php } if ($primaryLanguage=='farsi')    { ?><?php echo 'Farsi'?><?php } ?>
                        </div>
                    </div>

                    <div  class="row mb-2">
                        <div class="col-4 fw-bold">English Proficiency</div>
                        <div class="col-7"><?php if ($englishProficiency=='Yes') { ?><?php echo 'Yes'?><?php } else { ?><?php echo 'No'?><?php } ?></div>
                    </div>
                </div>
    
                <div id ="userEthnicityInfoEdit" style="transition:1ms;" class ="collapse collapse">
                    <form method="POST" action="includes/participantDash1-2EthnicityInfoEdit.inc.php">
                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Hispanic/Latino Heritage</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php   if ($hispanicHeritage=='Yes') { ?><input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes" checked="checked">
                                    <?php } else                          { ?><input class="form-check-input" type="radio" name="hispanic" id="yhispanic" value="Yes"><?php } ?>
                                    <label class="form-check-label" for="yhispanic">Yes</label>
                                </div>

                                <div class="form-check m-2">
                                    <?php   if ($hispanicHeritage=='No') { ?><input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No" checked="checked">
                                    <?php } else                         { ?><input class="form-check-input" type="radio" name="hispanic" id="nonhispanic" value="No"><?php } ?>
                                    <label class="form-check-label" for="nonhispanic">No</label>
                                </div>
                            </div>

                            <div class="col-1 text-end">
                                <button type="submit" class="text-decoration-none text-Blue" data-bs-toggle="collapse" data-bs-target="#userEthnicityInfoEdit,#userEthnicityInfoShow">Save</button>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Race</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php if ($africanAmercian_black=='Yes') { ?>
                                        <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes" checked="checked">
                                        <label for="africanAmerican_black">African American/Black</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="africanAmerican_black" name="africanAmerican_black" value="Yes">
                                        <label for="africanAmerican_black">African American/Black</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($americanIndian_alaskanNative=='Yes') { ?>
                                        <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes" checked="checked">
                                        <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="americanIndian_alaskanNative" name="americanIndian_alaskanNative" value="Yes">
                                        <label for="americanIndian_alaskanNative">American Indian/Alaskan Native</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($asian=='Yes') { ?>
                                        <input type="checkbox" id="asian" name="asian" value="Yes" checked="checked">
                                        <label for="asian">Asian</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="asian" name="asian" value="Yes">
                                        <label for="asian">Asian</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($hawaiian_other=='Yes') { ?>
                                        <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes" checked="checked">
                                        <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="hawaiian_other" name="hawaiian_other" value="Yes">
                                        <label for="hawaiian_other">Hawaiian/Other Pacific Islander</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($white=='Yes') { ?>
                                        <input type="checkbox" id="white" name="white" value="Yes" checked="checked">
                                        <label for="white">White</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="white" name="white" value="Yes">
                                        <label for="white">White</label><br>
                                    <?php } ?>
                                </div>

                                <div class="form-check m-2">
                                    <?php if ($noAnswer=='Yes') { ?>
                                        <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes" checked="checked">
                                        <label for="noAnswer">I do not wish to answer</label><br>
                                    <?php } else { ?>
                                        <input type="checkbox" id="noAnswer" name="noAnswer" value="Yes">
                                        <label for="noAnswer">I do not wish to answer</label><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">Primary Language</div>
                            <div class="col-7">
                                <select class="form-select-SM m-2 border rounded-2" name="language" id="language">
                                    <?php   if ($primaryLanguage=='eng')      { ?><option value="eng" selected>English</option>
                                    <?php } if ($primaryLanguage=='span')     { ?><option value="span" selected>Spanish</option>
                                    <?php } if ($primaryLanguage=='dari')     { ?><option value="dari" selected>Dari</option>
                                    <?php } if ($primaryLanguage=='pashto')   { ?><option value="pashto" selected>Pashto</option>
                                    <?php } if ($primaryLanguage=='rus')      { ?><option value="rus" selected>Russian</option>
                                    <?php } if ($primaryLanguage=='viet')     { ?><option value="viet" selected>Vietnamese</option>
                                    <?php } if ($primaryLanguage=='mandarin') { ?><option value="mandarin" selected>Mandarin</option>
                                    <?php } if ($primaryLanguage=='arabic')   { ?><option value="arabic" selected>Arabic</option>
                                    <?php } if ($primaryLanguage=='farsi')    { ?><option value="farsi" selected>Farsi</option><?php } ?>
                                    
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
                        </div>

                        <div  class="row mb-2">
                            <div class="col-4 fw-bold">English Proficiency</div>
                            <div class="col-7">
                                <div class="form-check m-2">
                                    <?php   if ($englishProficiency=='Yes') { ?><input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes" checked="checked">
                                    <?php } else                            { ?><input class="form-check-input" type="radio" name="proficiency" id="yproficiency" value="Yes"><?php } ?>
                                    <label class="form-check-label" for="yproficiency">Yes</label>
                                </div>
                        
                                <div class="form-check m-2">
                                    <?php   if ($englishProficiency=='No') { ?><input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No" checked="checked">
                                    <?php } else                           { ?><input class="form-check-input" type="radio" name="proficiency" id="nonProficiency" value="No"><?php } ?>
                                    <label class="form-check-label" for="nonProficiency">No</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </fieldset>
    </div>
</div>
    
