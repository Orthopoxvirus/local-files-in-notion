# local-files-in-notion
Add links to local files in Notion on Windows and Chrome

## Summary
One thing I really miss in Notion is links to the local filesystem. So I puzzled something together. Feel free to use, modify and add to this, so more people can use it.

Bear in mind: This only works if you use Notion solo and on one PC or if every user/PC shares the same datastructure.

## My Setup:

* Notion (obvioulsy)
* Chrome with the [Local Explorer addon](https://chrome.google.com/webstore/detail/local-explorer-open-file/eokekhgpaakbkfkmjjcbffibkencdfkl)
* Webserver

## Webserver
Clone the repo and change variables to yourdomain.com.

`file.html` serves a double purpose:

* Embed this site in Notion to easily generate file links. Just paste your local file path into the input field and hit enter.
* Since Notion may only treat weblinks as links, this file redirects generated weblinks to a `localexplorer:` format.

Don't forget to allow ifarmess with the `X-Frame-Options` if you want to embed the link generating tool.

## Notion
Embed the deployed `file.html` if you want.
You can now use generated links like `https://yourdomain.com/file.html?f=C:/`

## PHP
There is a PHP version available, which does the same thing. I like it because it handles the requests a lot faster with less flashing windows.
