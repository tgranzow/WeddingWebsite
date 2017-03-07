<html>
    <head>
        <?php
            $debugger=0;
            $gitHubUser="tnepper";
            $gitHubRepo="WeddingWebsite";
            $gitHubBranch="master";
            $downloadURL="https://codeload.github.com/" . $gitHubUser . "/" . $gitHubRepo . "/zip/" . $gitHubBranch;
        ?>
        <title>Fetch Latest from GitHub</title>
    </head>
    <body>
        <?php
            echo "Deleting old files...";
            exec("find ./* -not -name 'fetch.php' |xargs rm -rf --", $null, $exitStatus);
            if ($exitStatus == 0) {
                echo "Downloading...<br />";
                exec("wget $downloadURL 2>&1", $null, $exitStatus);
                if ($debugger == 1) {
                    for ($i=0; $i < count($null); $i++) {
                        echo $null[$i] . "<br />";
                    }
                }
                if ($exitStatus == 0) {
                    echo "Download Sucessfull<br />";
                    echo "Unzipping...<br />";
                    exec("unzip " . $gitHubBranch . " 2>&1", $null, $exitStatus);
                    if ($debugger == 1) {
                        for ($i=0; $i < count($null); $i++) {
                            echo $null[$i] . "<br />";
                        }
                    }
                    if ($exitStatus == 0) {
                        echo "Unzip Sucessfull<br />";
                        echo "Moving Files<br />";
                        exec ("mv ./" . $gitHubRepo . "-" . $gitHubBranch . "/* ./ 2>&1", $null, $exitStatus);
                        if ($debugger == 1) {
                            for ($i=0; $i < count($null); $i++) {
                                echo $null[$i] . "<br />";
                            }
                        }
                        if ($exitStatus == 0) {
                            echo "Move Sucessfull<br />";
                            echo "Cleaning Up...<br />";
                            exec ("rm -rf ./" . $gitHubRepo . "-" . $gitHubBranch . " 2>&1", $null, $exitStatus);
                            if ($debugger == 1) {
                                for ($i=0; $i < count($null); $i++) {
                                    echo $null[$i] . "<br />";
                                }
                            }
                            exec ("rm -rf ./" . $gitHubBranch . " 2>&1", $null, $exitStatus);
                            if ($debugger == 1) {
                                for ($i=0; $i < count($null); $i++) {
                                    echo $null[$i] . "<br />";
                                }
                            }
                            if ($exitStatus == 0) {
                                echo "Cleanup complete<br />";
                                echo "Task Complete<br />";
                            } else {
                                echo "Cleanup Failed<br />";
                            }
                        } else {
                            echo "Move Failed<br />";
                        }
                    } else {
                        echo "Unzip Failed<br />";
                    }
                } else {
                    echo "Download Failed<br />";
                }
            } else {
                echo "Deleting old files failed<br />";
            }
        ?>
    </body>
</html>
