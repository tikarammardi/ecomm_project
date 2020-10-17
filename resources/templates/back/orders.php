
       
<div class="row">
<h1 class="page-header">
   All Orders
   <h4 class="bg-success"><?php display_message(); ?></h4>

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Tansaction</th>
           <th>Currency</th>
           <!-- <th>Order Date</th> -->
           <th>Status</th>
      </tr>
    </thead>
    <tbody>
     <?php display_orders(); ?>
        

    </tbody>
</table>
</div>
