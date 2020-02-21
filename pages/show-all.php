<?php
    $costs_user = Cost::all();
    $incomes_user = Income::all();
    $total_incomes = Income::sum();
    $total_costs = Cost::sum();
    $budget = $total_incomes - $total_costs;
    if($total_incomes !== 0){
        $percentage = round($total_costs / $total_incomes * 100);
    }else{
        $percentage = 0;
    }
?>

<div class="top">
    <div class="budget">
        <div class="budget__title">
            Buget disponibil pentru 
                <span class="budget__title--month">
                    <?php
                        setlocale(LC_TIME, 'ro');
                        echo strftime('%B %Y'); 
                    ?>
                </span>:
        </div>
        
        <!-- BUGET DISPONIBIL -->
        <div class="budget__value"><?php echo $budget; ?></div>
        
        <!-- TOTAL VENITURI -->
        <div class="budget__income clearfix">
            <div class="budget__income--text">Venituri</div>
            <div class="right">
                <div class="budget__income--value">+ <?php echo $total_incomes; ?></div>
                <div class="budget__income--percentage">&nbsp;</div>
            </div>
        </div>
        
        <!-- TOTAL CHELTUIELI -->
        <div class="budget__expenses clearfix">
            <div class="budget__expenses--text">Cheltuieli</div>
            <div class="right clearfix">
                <div class="budget__expenses--value">- <?php echo $total_costs; ?></div>
                <div class="budget__expenses--percentage"><?php echo $percentage ?> %</div>
            </div>
        </div>
    </div>
    <div class="show-user"><?php echo $_SESSION['first_name'] ?></div>
</div>
        
<div class="bottom">
        
    <div class="add">
        <div class="add__container">
            <!-- FORMULARE PENTRU ADAUGAREA UNUI ITEM NOU -->
            <form action="./index.php?page=store" method="POST">
                <select class="add__type" name="select">
                    <option value="+" selected="">+</option>
                    <option value="-">-</option>
                </select>
                <input type="text"class="add__description" placeholder="Descriere" name="description" required />
                <input type="number" class="add__value" placeholder="Valoare" name="value" required />
                <button type="submit" class="add__btn"><i class="ion-ios-checkmark-outline"></i></button>
            </form>
        </div>
    </div>
    
    <div class="container clearfix">

        <!-- LISTA VENITURI -->
        <div class="income">
            <h2 class="icome__title">Venituri</h2>
            
            <div class="income__list">
                <?php 
                    if(empty($incomes_user)){ ?>
                        <div >Introduceti veniturile pentru luna curenta.</div>
                    <?php } 
                        foreach($incomes_user as $income_user){ 
                    ?>
                <div class="item clearfix" id="income-0">
                    <div class="item__description"><?php echo $income_user->description; ?></div>
                    <div class="right clearfix">
                        <div class="item__value">+ <?php echo $income_user->value; ?></div>
                        <div class="item__delete">
                            <a href="./index.php?page=delete-income&id=<?php echo $income_user->id ?>" class="item__delete--btn"><i class="ion-ios-close-outline"></i></a>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>                    
        </div>
        
        <!-- LISTA CHELTUIELI -->
        <div class="expenses">
            <h2 class="expenses__title">Cheltuieli</h2>
            
            <div class="expenses__list">
                <?php //$qty = 0; ?>
                <?php 
                    if(empty($costs_user)){ ?>
                        <div >Introduceti cheltuielile pentru luna curenta.</div>
                    <?php } 
                    foreach($costs_user as $cost_user){
                        if($total_incomes !== 0){
                            $cost_percentage = round($cost_user->value / $total_incomes * 100);
                        }else {
                            $cost_percentage = 0;
                        }
                ?>
                <div class="item clearfix" id="expense-0">
                    <div class="item__description"><?php echo $cost_user->description; ?></div>
                    <div class="right clearfix">
                        <div class="item__value">- <?php echo $cost_user->value; ?></div>
                        <div class="item__percentage"><?php echo $cost_percentage; ?> %</div>
                        <div class="item__delete">
                            <a href="./index.php?page=delete-cost&id=<?php echo $cost_user->id ?>" class="item__delete--btn"><i class="ion-ios-close-outline"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>                    
        </div>

    </div>
    
</div>

<!-- LINK LOGOUT -->
<a href="./index.php?page=signing-off" class="logout" title="Logout"><i class="ion-ios-close-outline"></i></a>
