<?php
namespace Page\Functional;

class Login
{
    // include url of current page
    public static $URL = '/';

    public $title = 'Preisvergleich - sicher günstig shoppen | CHECK24';
    public $naviTitle = 'Hallo! Anmelden';
    public $myAccountSpan = '#wf-user > div > div.navi__desc.navi__desc--caret > span';
    public $loginButton = '//*[@id="wf-user"]/span/div/div[1]/div/div/a';
    public $query ='//*[@id="query"]';

    public $loginFormTitle = '//*[@id="c24-cl-form-user-login"]/div[1]/div[1]/div[1]';
    public $usernameField = '//*[@id="cl_email"]';
    public $proceedButton = '//*[@id="c24-cl-user-btn"]';
    public $passwordField = '#cl_pw';
    public $submitButton = '//*[@id="c24-cl-pw-btn"]';

    public $userTitle = 'Hallo';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \FunctionalTester;
     */
    protected $functionalTester;

    public function __construct(\FunctionalTester $I)
    {
        $this->functionalTester = $I;
    }
    public function login($username, $password)
    {

        $I = $this->functionalTester;

        $I->amOnPage(self::$URL);
        $I->canSeeInTitle($this->title);
        $I->see($this->naviTitle);
        $I->moveMouseOver($this->myAccountSpan);

        $I->waitForElement($this->loginButton);
        $I->moveMouseOver($this->myAccountSpan);
        $I->click($this->query);
        $I->moveMouseOver($this->myAccountSpan);

        $I->click($this->loginButton);
        $I->seeElement($this->loginFormTitle);
        $I->fillField($this->usernameField, $username);
        $I->click($this->proceedButton);
        $I->waitForElementClickable($this->passwordField);
        $I->fillField($this->passwordField, $password);
        $I->click($this->submitButton);

        $I->see($this->userTitle);

    }
}
