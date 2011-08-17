PHPVideoDownloader
=============

PHPVideoDownloader is a set of PHP classes that can be used to discover raw video file URL's by only using the human readable URL of the video. At this stage, it can discover direct video download URL's of Youtube, Dailymotion and Vimeo.

Usage
-------

See the example.php file for usage. As some security precautions taken by video hosting sites, make sure that you consume the video URL's that were produced by the classes in several minutes. Otherwise, these URL's will be invalid in a few minutes.

Contributing
------------

Want to contribute? You can extend abstract class "Hoster" and write your own discovering plugin. All you need is to find out how functions that video hosting site and write a tiny robot that finds the video url.