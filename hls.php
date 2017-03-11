<?php
/*
Hook Line Syncer
Version 1.0
Written By: Jason Granzow
GitHub: https://github.com/jgranzow86/HookLineAndSyncer

This uses GitLab's hooks to sync
your latested pushed master branch
to your webserver running PHP.
*/

// Take payload from github and load it into an array
$payload=json_decode($_POST['payload'],true);
// Get the name of the current branch
$branch=explode("/", $payload['ref'])[2];
// Get the owner of the repository
$repoUserName=$payload['repository']['owner']['name'];
// Get the name of the repository
$repoName=$payload['repository']['name'];
// Create the URL required to fetch branches from the repository
$branchURL="https://github.com/" . $repoUserName . "/" . $repoName . "/archive/" . $branch . ".zip";
// Name of the downloaded zip
$zippedBranch=$branch . ".zip";
// Name of the folder extracted from the zip
$unzippedBranch=$repoName . "-" . $branch;

if ($branch === "master") {
    // Download zipped branch
    file_put_contents($zippedBranch, fopen($branchURL, "r"));

    if (file_exists($zippedBranch)) {
        echo "File downloaded.\n";

        // Unzip downloaded branch
        $zipExtract = new ZipArchive;
        if ($zipExtract->open($zippedBranch) === TRUE) {
            $zipExtract->extractTo("./");
            $zipExtract->close();
            echo "Unziped Sucessfull\n";

            // Check if directory is there
            if (is_dir($unzippedBranch)) {
                // Scan directory and create array of files
                $files=scandir($unzippedBranch);
                // Cycle through array and move files from unzipped branch folder
                foreach ($files as $fileName) {
                    if ($fileName != "." && $fileName != "..") {
                        rename($unzippedBranch . "/" . $fileName, "./" . $fileName);
                    }
                }

                // Remove zipped branch and unzipped branch folder
                rmdir($unzippedBranch);
                unlink($zippedBranch);
            }
        } else {
            echo "Unzip Failed";
        }
    } else {
        echo "Failed to download.";
    }
}
?>