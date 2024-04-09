<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin Information</title>
    <script src="{{ asset('js/clientjs.min.js') }}"></script>
</head>
<body>
    <h1>Device Information</h1>
    <div id="result"></div>
    <script>

        async function getNetworkType() {
            if (navigator.connection && navigator.connection.getEffectiveType) {
                return navigator.connection.getEffectiveType();
            } else {
                console.warn("Network Information API not supported");
                return "Unknown";
            }
        }
        async function fetchIpAddress() {
            try {
                const response = await fetch('https://api.ipify.org?format=json');
                const data = await response.json();
                return data.ip;
            } catch (error) {
                console.error('Error fetching IP address:', error);
                return null;
            }
        }
        async function reverseInfo(resolutionSize){
            // Split the string by 'x' delimiter
            const [width, height] = resolutionSize.split('x');
            // Return the resolution parts in reversed order
            return `${height}x${width}`;
        }
       
        async function getInfo() {
            const ip = await fetchIpAddress();
            const network = getNetworkType();
            console.log(network)
            // in a browser, when using a script tag:
            const ClientJS = window.ClientJS;
            // Create a new ClientJS object
            const client = new ClientJS();
            const availResolution = await reverseInfo(client.getAvailableResolution());
            const landscape = await reverseInfo(client.getCurrentResolution());
            const info = [
                // client.getBrowserData(),
                client.getFingerprint(),
                client.getCustomFingerprint(
                    client.getTimeZone(),
                    client.getLanguage(),
                    client.getFonts(),
                    client.getOS(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    client.isCanvas(),
                    client.isSilverlight(),
                    client.isMobile(),
                    client.isMobileMajor(),
                    client.isMobileAndroid(),
                    client.isMobileOpera(),
                    client.isMobileWindows(),
                    client.isMobileBlackBerry(),
                    client.isMobileIOS(),
                    client.isIphone(),
                    client.isIpad(),
                    client.isIpod(),
                    client.getDeviceType(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip,
                    client.getAvailableResolution(),
                    client.getCurrentResolution(),
                ),
                client.getCustomFingerprint(
                    client.getTimeZone(),
                    client.getLanguage(),
                    client.getFonts(),
                    client.getOS(),
                    client.getEngine(),
                    client.isCookie(),
                    client.isSessionStorage(),
                    client.isCanvas(),
                    client.isSilverlight(),
                    client.isMobile(),
                    client.isMobileMajor(),
                    client.isMobileAndroid(),
                    client.isMobileOpera(),
                    client.isMobileWindows(),
                    client.isMobileBlackBerry(),
                    client.isMobileIOS(),
                    client.isIphone(),
                    client.isIpad(),
                    client.isIpod(),
                    client.getDeviceType(),
                    client.isWindows(),
                    client.isMac(),
                    client.isLinux(),
                    client.isUbuntu(),
                    ip,
                    availResolution,
                    landscape,
                ),
                client.getUserAgent(),
                client.getUserAgentLowerCase(),
                client.getBrowser(),
                client.getBrowserVersion(),
                client.getBrowserMajorVersion(),
                client.isIE(),
                client.isChrome(),
                client.isFirefox(),
                client.isSafari(),
                client.isOpera(),
                client.getEngine(),
                client.getEngineVersion(),
                client.getOS(),
                client.getOSVersion(),
                client.isWindows(),
                client.isMac(),
                client.isLinux(),
                client.isUbuntu(),
                client.isSolaris(),
                client.getDevice(),
                client.getDeviceType(),
                client.getDeviceVendor(),
                client.getCPU(),
                client.isMobile(),
                client.isMobileMajor(),
                client.isMobileAndroid(),
                client.isMobileOpera(),
                client.isMobileWindows(),
                client.isMobileBlackBerry(),
                client.isMobileIOS(),
                client.isIphone(),
                client.isIpad(),
                client.isIpod(),
                client.getScreenPrint(),
                client.getColorDepth(),
                client.getCurrentResolution(),
                client.getAvailableResolution(),
                client.getDeviceXDPI(),
                client.getDeviceYDPI(),
                client.getPlugins(),
                client.isJava(),
                client.getJavaVersion(), // functional only in java and full builds, throws an error otherwise
                client.isFlash(),
                client.getFlashVersion(), // functional only in flash and full builds, throws an error otherwise
                client.isSilverlight(),
                client.getSilverlightVersion(),
                client.getMimeTypes(),
                client.isMimeTypes(),
                client.isFont(),
                client.getFonts(),
                client.isLocalStorage(),
                client.isSessionStorage(),
                client.isCookie(),
                client.getTimeZone(),
                client.getLanguage(),
                client.getSystemLanguage(),
                client.isCanvas(),
                client.getCanvasPrint(),
                ip,
                availResolution,
                landscape,
            ];
            const distinct = [
                // 'getBrowserData',
                'getFingerprint',
                'getCustomFingerprintCurrentResolution',
                'getCustomFingerprintAvailableResolution',
                'getUserAgent',
                'getUserAgentLowerCase',
                'getBrowser',
                'getBrowserVersion',
                'getBrowserMajorVersion',
                'isIE',
                'isChrome',
                'isFirefox',
                'isSafari',
                'isOpera',
                'getEngine',
                'getEngineVersion',
                'getOS',
                'getOSVersion',
                'isWindows',
                'isMac',
                'isLinux',
                'isUbuntu',
                'isSolaris',
                'getDevice',
                'getDeviceType',
                'getDeviceVendor',
                'getCPU',
                'isMobile',
                'isMobileMajor',
                'isMobileAndroid',
                'isMobileOpera',
                'isMobileWindows',
                'isMobileBlackBerry',
                'isMobileIOS',
                'isIphone',
                'isIpad',
                'isIpod',
                'getScreenPrint',
                'getColorDepth',
                'getCurrentResolution',
                'getAvailableResolution',
                'getDeviceXDPI',
                'getDeviceYDPI',
                'getPlugins',
                'isJava',
                'getJavaVersion',
                'isFlash',
                'getFlashVersion',
                'isSilverlight',
                'getSilverlightVersion',
                'getMimeTypes',
                'isMimeTypes',
                'isFont',
                'getFonts',
                'isLocalStorage',
                'isSessionStorage',
                'isCookie',
                'getTimeZone',
                'getLanguage',
                'getSystemLanguage',
                'isCanvas',
                'getCanvasPrint',
                'ipAddress',
                'getCurrentResolutionModify',
                'getAvailableResolutionModify',
            ];
            const fingerprintWithName = Object.fromEntries(distinct.map((key, index) => [key, info[index]]));
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '<pre>' + JSON.stringify(fingerprintWithName, null, 2) + '</pre>';
            console.log(fingerprintWithName);
        }
        // Call the function to get the info
        getInfo();
    </script>
</body>
</html>
