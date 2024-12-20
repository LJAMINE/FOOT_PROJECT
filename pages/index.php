<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../style/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    
        <button><a href="dashboard.php" style="text-decoration: none; color: white;">Admin</a></button>
    <div class="bigcontainer">
        <h1>Players Formation</h1>

        <div class="drawar">

            <button id="closeme">close</button>
            <form id="playerForm">


                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Player Name" required>

                <label for="photo">Photo URL</label>
                <input type="url" id="photo" name="photo" placeholder="https://example.com/photo.png" required>




                <label for="nationality">Nationality</label>
                <input type="text" id="nationality" name="nationality" placeholder="England, Argentina, Portugal"
                    required>

                <label for="flag">Flag URL</label>
                <input type="url" id="flag" name="flag" placeholder="https://example.com/flag.png" required>
                <label for="position" id="positionLabel">position</label>

                <select name="" id="positionPlayer">
                    <option value="GK">GK</option>
                    <option value="CBR">CBR</option>
                    <option value="CBL">CBL</option>
                    <option value="LB">LB</option>
                    <option value="RB">RB</option>
                    <option value="CM">CM</option>
                    <option value="RM">RM</option>
                    <option value="LM">LM</option>
                    <option value="RW">RW</option>
                    <option value="LW">LW</option>
                    <option value="ST">ST</option>
                </select>

                <label for="club">Club</label>
                <input type="text" id="club" name="club" placeholder="Liverpool, Real Madrid " required>

                <label for="logo">Club Logo URL</label>
                <input type="url" id="logo" name="logo" placeholder="https://example.com/logo.png" required>

                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" min="0" max="100" placeholder="  please enter rating"
                    required>

                <label for="pace">Pace</label>
                <input type="number" id="pace" name="pace" min="0" max="100" placeholder="  please enter pace "
                    required>

                <label for="shooting">Shooting</label>
                <input type="number" id="shooting" name="shooting" min="0" max="100"
                    placeholder=" please enter shooting" required>

                <label for="passing">Passing</label>
                <input type="number" id="passing" name="passing" min="0" max="100" placeholder=" please enter passing"
                    required>

                <label for="dribbling">Dribbling</label>
                <input type="number" id="dribbling" name="dribbling" min="0" max="100"
                    placeholder=" please enter dribbling" required>

                <label for="defending">Defending</label>
                <input type="number" id="defending" name="defending" min="0" max="100"
                    placeholder=" please enter defending" required>

                <label for="physical">Physical</label>
                <input type="number" id="physical" name="physical" min="0" max="100"
                    placeholder=" please enter physical" required>


                <button id="submitButton" type="submit">Submit</button>
            </form>



        </div>

        <!-- GK--------- -->

        <div class="drawarGK">

            <button id="closemeGK">close</button>
            <form id="playerForm">


                <label for="name">Name</label>
                <input type="text" id="nameGK" name="name" placeholder="Player Name" required>

                <label for="photo">Photo URL</label>
                <input type="url" id="photoGK" name="photo" placeholder="https://example.com/photo.png" required>




                <label for="nationality">Nationality</label>
                <input type="text" id="nationalityGK" name="nationality" placeholder="England, Argentina, Portugal"
                    required>

                <label for="flag">Flag URL</label>
                <input type="url" id="flagGK" name="flag" placeholder="https://example.com/flag.png" required>
                <label for="position">position</label>

                <select name="" id="positionPlayerGK">
                    <option value="GK">GK</option>
                    <option value="CB">CB</option>
                    <option value="LB">LB</option>
                    <option value="RB">RB</option>
                    <option value="CM">CM</option>
                    <option value="RW">RW</option>
                    <option value="LW">LW</option>
                    <option value="ST">ST</option>
                </select>

                <label for="clubGK">Club</label>
                <input type="text" id="clubGK" name="club" placeholder="Liverpool, Real Madrid " required>

                <label for="logo">Club Logo URL</label>
                <input type="url" id="logoGK" name="logo" placeholder="https://example.com/logo.png" required>

                <label for="rating">Rating</label>
                <input type="number" id="ratingGK" name="rating" min="0" max="100" placeholder="  please enter rating"
                    required>

                <label for="diving">diving</label>
                <input type="number" id="diving" name="diving" min="0" max="100" placeholder="  please enter diving "
                    required>

                <label for="handling">handling</label>
                <input type="number" id="handling" name="handling" min="0" max="100"
                    placeholder=" please enter handling" required>

                <label for="kicking">kicking</label>
                <input type="number" id="kicking" name="kicking" min="0" max="100" placeholder=" please enter kicking"
                    required>

                <label for="reflexes">reflexes</label>
                <input type="number" id="reflexes" name="reflexes" min="0" max="100"
                    placeholder=" please enter reflexes" required>

                <label for="speed">speed</label>
                <input type="number" id="speed" name="speed" min="0" max="100" placeholder=" please enter speed"
                    required>

                <label for="positioning">positioning</label>
                <input type="number" id="positioning" name="positioning" min="0" max="100"
                    placeholder=" please enter positioning" required>



                <button id="submitButtonGK" type="submit">Submit</button>
            </form>



        </div>


        <div class="gridcontainer">
            <div class="terrain">
                <div class="attaque">
                    <div id="LW" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">LW</div>
                        <i class="fa-solid fa-plus addButton" player-post="LW"></i>

                        <!-- <button class="addButton" player-post="LW"><i class="fa-solid fa-plus"></i> <div></div></button> -->

                        <!-- <button class="addButton" player-post="LW">add <div></div>
                        </button> -->
                    </div>

                    <div id="ST" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">ST</div>
                        <i class="fa-solid fa-plus addButton" player-post="ST"></i>


                        <!-- <div id="">ST</div> <button class="addButton" player-post="ST">add <div></div>
                        </button> -->
                    </div>
                    <div id="RW" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">RW</div>
                        <i class="fa-solid fa-plus addButton" player-post="RW"></i>

                        <!-- <div id="">RW</div> <button class="addButton" player-post="RW">add</button> -->
                    </div>

                </div>

                <div class="milieu">
                    <div id="LM" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">LM</div>
                        <i class="fa-solid fa-plus addButton" player-post="LM"></i>

                        <!-- <div id="">LM</div> <button class="addButton" player-post="LM">add</button> -->
                    </div>
                    <div id="CM" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">CM</div>
                        <i class="fa-solid fa-plus addButton" player-post="CM"></i>

                        <!-- <div id="">CM</div> <button class="addButton" player-post="CM">add</button> -->
                    </div>
                    <div id="RM" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">RM</div>
                        <i class="fa-solid fa-plus addButton" player-post="RM"></i>

                        <!-- <div id="">RM</div> <button class="addButton" player-post="RM">add</button> -->
                    </div>

                </div>

                <div class="defence">
                    <div id="LB" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">LB</div>
                        <i class="fa-solid fa-plus addButton" player-post="LB"></i>

                        <!-- <div id="">LB</div> <button class="addButton" player-post="LB">add</button> -->
                    </div>
                    <div id="CBL" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">CBL</div>
                        <i class="fa-solid fa-plus addButton" player-post="CBL"></i>

                        <!-- <div id="">CBL</div> <button class="addButton" player-post="CBL">add</button> -->
                    </div>
                    <div id="CBR" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">CBR</div>
                        <i class="fa-solid fa-plus addButton" player-post="CBR"></i>

                        <!-- <div id="">CBR</div> <button class="addButton" player-post="CBR">add</button> -->
                    </div>
                    <div id="RB" class="images">
                        <div id="myStockLw">


                            <div id="imagerating">
                                <div id="myplayerImage"></div>
                                <div id="leftinfo">
                                    <div id="ratingss"> </div>
                                    <div id="flagss"></div>
                                </div>
                            </div>

                            <div id="nameofPlayer"> </div>
                            <div id="stats">
                                <div id="statsRight"></div>
                                <div id="statsleft"></div>
                            </div>
                        </div>
                        <div id="remplacenPosition">RB</div>
                        <i class="fa-solid fa-plus addButton" player-post="RB"></i>

                    </div>
                </div>

                <div class="goalKeeper">
                    <div id="GK" class="images ">
                        <div id="myStockLw">
                            <div class="goalKeeperCard">
                                <div id="imagerating">
                                    <div id="myplayerImage"></div>
                                    <div id="leftinfo">
                                        <div id="ratingss"></div>
                                        <div id="flagss"></div>
                                    </div>
                                </div>

                                <div id="nameofPlayer"></div>
                                <div id="stats">
                                    <div id="statsRight"></div>
                                    <div id="statsleft"></div>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="newDiv">
                         </div> -->
                        <div id="remplacenPosition">GK</div>
                        <i class="fa-solid fa-plus clickGK" player-post="GK"></i>


                    </div>
                </div>



            </div>



        </div>


        <div class="remplccent">

            <div id="remplacent1" class="images">
                <div id="myStockLw">


                    <div id="imagerating">
                        <div id="myplayerImage"></div>
                        <div id="leftinfo">
                            <div id="ratingss"> </div>
                            <div id="flagss"></div>
                        </div>
                    </div>

                    <div id="nameofPlayer"> </div>
                    <div id="stats">
                        <div id="statsRight"></div>
                        <div id="statsleft"></div>
                    </div>
                </div>
                <div id="remplacenPosition"></div>
                <i class="fa-solid fa-plus addButton" player-post="remplacent1"></i>
                <!-- <button class="addButton" player-post="remplacent1">add</button> -->
            </div>
            <div id="remplacent2" class="images">
                <div id="myStockLw">


                    <div id="imagerating">
                        <div id="myplayerImage"></div>
                        <div id="leftinfo">
                            <div id="ratingss"> </div>
                            <div id="flagss"></div>
                        </div>
                    </div>

                    <div id="nameofPlayer"> </div>
                    <div id="stats">
                        <div id="statsRight"></div>
                        <div id="statsleft"></div>
                    </div>
                </div>
                <div id="remplacenPosition"></div>
                <!-- <button class="addButton" player-post="remplacent2">add</button> -->
                <i class="fa-solid fa-plus addButton" player-post="remplacent2"></i>

            </div>
            <div id="remplacent3" class="images">
                <div id="myStockLw">


                    <div id="imagerating">
                        <div id="myplayerImage"></div>
                        <div id="leftinfo">
                            <div id="ratingss"> </div>
                            <div id="flagss"></div>
                        </div>
                    </div>

                    <div id="nameofPlayer"> </div>
                    <div id="stats">
                        <div id="statsRight"></div>
                        <div id="statsleft"></div>
                    </div>
                </div>
                <div id="remplacenPosition"></div>
                <i class="fa-solid fa-plus addButton" player-post="remplacent3"></i>
                <!-- <button class="addButton" player-post="remplacent3">add</button> -->
            </div>
            <div id="remplacent4" class="images">
                <div id="myStockLw">


                    <div id="imagerating">
                        <div id="myplayerImage"></div>
                        <div id="leftinfo">
                            <div id="ratingss"> </div>
                            <div id="flagss"></div>
                        </div>
                    </div>

                    <div id="nameofPlayer"> </div>
                    <div id="stats">
                        <div id="statsRight"></div>
                        <div id="statsleft"></div>
                    </div>
                </div>
                <div id="remplacenPosition"> </div>
                <i class="fa-solid fa-plus addButton" player-post="remplacent4"></i>
                <!-- <button class="addButton" player-post="remplacent4">add</button> -->
            </div>



        </div>


    </div>







    <script src="script.js"></script>
    
</body>

</html>