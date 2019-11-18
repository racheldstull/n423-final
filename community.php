<?php

// create page title value
$uri = "";
$page_title = "Community";

// create requires for the header and database
require_once ('includes/connect.php');
require_once ('includes/head.php');

?>

<main>
    <div class="community-main-wrapper">
        <div class="community-sub-nav">
            <div class="sub-nav-top">
                <h1>Community Discussions</h1>
            </div>
            <div class="sub-nav-bottom">
                <div class="sub-nav-left">
                    <a href="#"><i class="fas fa-search"></i></a>
                    <p>&nbsp; | &nbsp;</p>
                    <input type="text">
                </div>
                <div class="sub-nav-middle">
                    <a href="#">All</a>
                    <a href="#">Alcoholism</a>
                    <a href="#">Drug Addiction</a>
                    <a href="#">Friends and Family</a>
                </div>
                <div class="sub-nav-right">
                    <button>Create Post</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="community-content">
            <div class="topics-list">
                <div class="topics-legend">
                    <div class="topics-legend-row">
                        <div class="legend-item legend-title">Title</div>
                        <div class="legend-item">Topic</div>
                        <div class="legend-item">Comments</div>
                        <div class="legend-item">Latest Activity</div>
                    </div>
                </div>
                <div class="topics-list-items">
                    <!--                    <div class="topics-list-row">-->
                    <!--                        <a href="#">-->
                    <!--                            <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>-->
                    <!--                                <span class="cite">-->
                    <!--                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>-->
                    <!--                            </span>-->
                    <!--                            </div>-->
                    <!--                            <div class="topics-details">Alcoholism</div>-->
                    <!--                            <div class="topics-details">0 replies</div>-->
                    <!--                            <div class="topics-details">3 hours ago</div>-->
                    <!--                        </a>-->
                    <!--                    </div>-->
                    <div id="topic-topicDetailsTemplate" class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                    <div class="topics-list-row">
                        <div class="topics-details details-title">Lorem ipsum dolor sit amet, consectetur adip... <br>
                            <span class="cite">
                                Posted <span class="italics">3 hours ago</span>, by <span class="italics">JohnDoe2019</span>
                            </span>
                        </div>
                        <div class="topics-details">Alcoholism</div>
                        <div class="topics-details">0 replies</div>
                        <div class="topics-details">3 hours ago</div>
                    </div>
                </div>
                <div class="topics-pagination">
                    <button class="currentPage">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>Next ></button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once ('includes/footer.php');

?>


