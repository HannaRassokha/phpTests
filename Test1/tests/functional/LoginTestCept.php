<?php
$username = 'anna.rassokha@gmail.com';
$password = '880528_z_zZ';



$I = new FunctionalTester($scenario);
$loginPage = new \Page\Functional\Login($I);
$loginPage->login($username, $password);

$I->wait(5);
$I->waitForElement('//*[@id="query"]');
$I->fillField('//*[@id="query"]', 'Monitor');
$I->waitForElementClickable('#wf-search > button > svg');
$I->click('#wf-search > button > svg');
$I->wait(5);
$I->seeElement('//*[@id="category"]/h1');
$I->click('#productteaser-template-destination > div:nth-child(1) > div > a');
$I->seeElement('//*[@id="c24-page-and-ads"]/div[4]/div[2]/div[1]/div[1]/div/div[2]/h1');
$I->click('//*[@id="offer-buybox"]/div[6]/div[6]/div[1]/div/button');
$I->wait(5);
$I->see('Ihr Produkt wurde erfolgreich zum Warenkorb hinzugefügt.', '//*[@id="offer-list"]/div[1]/div/div/div[1]/span');
$I->click('//*[@id="offer-list"]/div[1]/div/div/div[2]/div[1]/div[2]/a[2]');
$I->wait(5);
$I->see('Warenkorb', 'h1');
//TO DO: check price
//$I->see('159,00 €', '#offer-buybox > div:nth-child(1) > p.offer-list__price.qa-offer-price');
?>