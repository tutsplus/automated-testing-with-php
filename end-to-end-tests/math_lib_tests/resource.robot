*** Settings ***

Documentation  A resource file containing the application specific keywords
...            that create our own domain specific language. This resource
...            implements keywords for testing HTML version of the test
...            application.
Library        Selenium2Library


*** Variables ***

${SERVER}        localhost:63342
${BROWSER}       chrome
${DELAY}         0
${MATHLIB URL}   http://${SERVER}/Automated%20Testing%20in%20PHP/src/index.php#


*** Keywords ***

Start Browser
    Open Browser    ${MATHLIB URL}    ${BROWSER}
    Set Selenium Speed     ${DELAY}

Go To Mathematical Library Page
    Go To     ${MATHLIB URL}
    Title Should Be    MathLib

Input Number for Double
    [Arguments]  ${number}
    Input Text   number    ${number}

Submit for Computation
    Submit Form   double

Result Should be
    [Arguments]   ${expectedResult}
    Page Should Contain    ${expectedResult}