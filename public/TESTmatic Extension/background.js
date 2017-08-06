
chrome.runtime.onMessageExternal.addListener(function(request, sender, sendResponse) {
    chrome.tabs.captureVisibleTab(
        null,
        {},
        function(dataUrl)
        {
            sendResponse({imgSrc:dataUrl});
        }
    ); //remember that captureVisibleTab() is a statement
    return true;
});

chrome.webRequest.onHeadersReceived.addListener(
  function (details) {
    return {
      responseHeaders: details.responseHeaders.filter(function(header) {
        return (header.name.toLowerCase() !== 'x-frame-options');
      })
    };
  }, {
    urls: ["<all_urls>"]
  }, ["blocking", "responseHeaders"]);
