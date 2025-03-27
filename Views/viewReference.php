<!-- author: Théo Cornu
author : Lola Cohidon-->
<?php require 'translations.php' ?>
<link rel="stylesheet" href="Public/css/reference6.css">
<?php include 'companion.php'; ?>
<div id="ContaintReference">
    <!--Search bar-->
    <div class="search">
        <div class="search-box">
            <div class="search-field">
                <input list="TaskProp" placeholder="<?= $translations[$language]['reference_searchbox_search']?>" id="research" class="input" type="text">
                <datalist id="TaskProp">
                    <option value="<?= $translations[$language]['reference_searchbox_cleaning']?>">                              
                    <option value="<?= $translations[$language]['reference_searchbox_shopping']?>"> 
                    <option value="<?= $translations[$language]['reference_searchbox_cooking']?>"> 
                    <option value="<?= $translations[$language]['reference_searchbox_dishes']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_laundry']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_childrenCare']?>">                               
                    <option value="<?= $translations[$language]['reference_searchbox_childsPlay']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_childrensJourney']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_parentJourney']?>">                                 
                    <option value="<?= $translations[$language]['reference_searchbox_parentCare']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_administrative']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_petCare']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_gardening']?>">                             
                    <option value="<?= $translations[$language]['reference_searchbox_diy']?>">
                    <option value="<?= $translations[$language]['reference_searchbox_householdManagement']?>">
                </datalist> 
                <div class="search-box-icon">
                    <button id="btn-icon-content">
                        <i class="search-icon">
                            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Reference table-->
    <!-- <div class="ReferenceTable"> -->
    <table>
        <tr>
            <th class="thToDisplay" id="activityColumn"><?= $translations[$language]['reference_table_activity']?></th>
            <th class="thToNotDisplay" id="descriptiveColumn"><?= $translations[$language]['reference_table_descriptive']?></th>
            <th class="thToNotDisplay" id="quarterHourValueColumn"><?= $translations[$language]['reference_table_quarter']?></th>
            <th class="thToNotDisplay" id="monetaryValueColumn"><?= $translations[$language]['reference_table_monetary']?></th>
            <th class="thToNotDisplay" id="exampleQuarterHourColumn"><?= $translations[$language]['reference_table_exemple1']?></th>
            <th class="thToNotDisplay" id="exampleMonetaryColumn"><?= $translations[$language]['reference_table_exemple2']?></th>
        </tr>
        <!-- Cleaning -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_cleaning.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_cleaning']?>"><?= $translations[$language]['reference_searchbox_cleaning']?></p>
                    </div>
                </div>
                <div class="extra-info">
                <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_cleaning']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes"><?= $translations[$language]['reference_exemple1']?></p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney"><?= $translations[$language]['reference_exemple2']?></p>
                    </div>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_cleaning']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay"><?= $translations[$language]['reference_exemple1']?></td>
            <td class ="tdToNotDisplay"><?= $translations[$language]['reference_exemple2']?></td>
        </tr>
        <!-- Shopping -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_shopping.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_shopping']?>"><?= $translations[$language]['reference_searchbox_shopping']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_shopping']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                    </div>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_shopping']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- Cooking -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_cooking.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_cooking']?>"><?= $translations[$language]['reference_searchbox_cooking']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_cooking']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes"><?= $translations[$language]['reference_exemple3']?></p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney"> 3,75€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_cooking']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay"><?= $translations[$language]['reference_table_exemple2']?></td>
            <td class ="tdToNotDisplay">3,75€</td>
        </tr>
        <!-- Dishes -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_dishes.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_dishes']?>"><?= $translations[$language]['reference_searchbox_dishes']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_dishes']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">2 (30 minutes)</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">7,5€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_dishes']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">2 (30 minutes)</td>
            <td class ="tdToNotDisplay">7,5€</td>
        </tr>
        <!-- Laundry -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_laundry.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_laundry']?>"><?= $translations[$language]['reference_searchbox_laundry']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_laundry']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_laundry']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- ChildrensCare -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_childrenCare.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_childrenCare']?>"><?= $translations[$language]['reference_searchbox_childrenCare']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_childrenCare']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">8</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">30€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_childrenCare']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">8</td>
            <td class ="tdToNotDisplay">30€</td>
        </tr>
        <!-- ChildsPlay -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_childsPlay.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_childsPlay']?>"><?= $translations[$language]['reference_searchbox_childsPlay']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_childsPlay']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_childsPlay']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- ChildrensJourney -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_childrensJourney.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_childrensJourney']?>"><?= $translations[$language]['reference_searchbox_childrensJourney']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">1</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">3,75€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_childrensJourney']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">8</td>
            <td class ="tdToNotDisplay">30€</td>
        </tr>
        <!-- ParentJourney -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_parentJourney.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_parentJourney']?>"><?= $translations[$language]['reference_searchbox_parentJourney']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_parentJourney']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">3</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">11,25€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_parentJourney']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">3</td>
            <td class ="tdToNotDisplay">11,25€</td>
        </tr>
        <!-- ParentCare -->
        <tr>
                <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_parentCare.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_parentCare']?>"><?= $translations[$language]['reference_searchbox_parentCare']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_parentCare']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">5</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">18,75€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_parentCare']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">5</td>
            <td class ="tdToNotDisplay">18,75€</td>
        </tr>
        <!-- Administrative -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_administrative.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_administrative']?>"><?= $translations[$language]['reference_searchbox_administrative']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_administrative']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_administrative']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- PetCare -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_petCare.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_petCare']?>"><?= $translations[$language]['reference_searchbox_petCare']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_petCare']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_petCare']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- Gardening -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_gardening.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_gardening']?>"><?= $translations[$language]['reference_searchbox_gardening']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_gardening']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">6</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">22,5€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_gardening']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">6</td>
            <td class ="tdToNotDisplay">22,5€</td>
        </tr>
        <!-- DIY -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_diy.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_diy']?>"><?= $translations[$language]['reference_searchbox_diy']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_diy']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">4</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">15€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_diy']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">4</td>
            <td class ="tdToNotDisplay">15€</td>
        </tr>
        <!-- HouseholdManagement -->
        <tr>
            <td class="tdToDisplay">
                <div class="action">
                    <div>
                        <img class="icon" src="Public/image/page_reference/img_householdManagement.png" alt="">
                    </div>
                    <div>
                        <p id="<?= $translations[$language]['reference_searchbox_householdManagement']?>"><?= $translations[$language]['reference_searchbox_householdManagement']?></p>
                    </div>
                </div>
                <div class="extra-info">
                    <h2><?= $translations[$language]['reference_table_description']?></h2>
                    <p class="description"><?= $translations[$language]['reference_desc_householdManagement']?></p>
                    <h2><?= $translations[$language]['reference_table_quarter']?></h2>
                    <p class="value">4</p>
                    <h2><?= $translations[$language]['reference_table_monetary']?></h2>
                    <p class="money">15€</p>
                    <h2><?= $translations[$language]['reference_table_exemple1']?></h2>
                    <p class="exampleMinutes">2</p>
                    <h2><?= $translations[$language]['reference_table_exemple2']?></h2>
                    <p class="exampleMoney">7,5€</p>
                </div>
            </td>
            <td class="tdToNotDisplay"><?= $translations[$language]['reference_desc_householdManagement']?></td>
            <td class="tdToNotDisplay">4</td>
            <td class="tdToNotDisplay">15€</td>
            <td class ="tdToNotDisplay">2</td>
            <td class ="tdToNotDisplay">7,5€</td>
        </tr>
    </table>
    
</div>

<script src="Public/Animation_js/reference.js"></script>



