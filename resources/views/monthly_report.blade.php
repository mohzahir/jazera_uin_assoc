<div class="box grid-box">

    <div class="box-header with-border">
        <div class="pull-right">
            

            <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="http://localhost:8000/admin/report/monthly_income?_pjax=%23pjax-container&amp;_export_=all" target="_blank" class="btn btn-sm btn-twitter" title="Export"><i class="fa fa-download"></i><span class="hidden-xs"> Export</span></a>
                <button type="button" class="btn btn-sm btn-twitter dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="http://localhost:8000/admin/report/monthly_income?_pjax=%23pjax-container&amp;_export_=all" target="_blank">All</a></li>
                    <li><a href="http://localhost:8000/admin/report/monthly_income?_pjax=%23pjax-container&amp;_export_=page%3A1" target="_blank">Current page</a></li>
                    <li><a href="http://localhost:8000/admin/report/monthly_income?_pjax=%23pjax-container&amp;_export_=selected%3A__rows__" target="_blank" class="export-selected">Selected rows</a></li>
                </ul>
            </div>

        </div>
        
    </div>




    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover grid-table" id="grid-table6346b84048f5c">
            <thead>
                <tr>
                    
                    <th class="column-id">Id</th>
                    <th class="column-name">Month</th>
                    <th class="column-email">Total Income Amount</th>
                    <th class="column-email">Total Expense Amount</th>
                    <th class="column-email">AVG Month</th>
                </tr>
            </thead>


            <tbody>

                @foreach($data as $month)
                <tr data-key="1">
                    
                    <td class="">
                        {{ $loop->iteration }}
                    </td>
                    <td class="">
                        {{ $month->month }}
                    </td>
                    <td class="">
                        {{ $month->total_month_income_amount }}
                    </td>
                    <td class="">
                        {{ $month->total_month_expense_amount }}
                    </td>
                    <td class="">
                        {{ $month->total_month }}
                    </td>
                    
                </tr>
                @endforeach
            </tbody>



        </table>

    </div>



    <div class="box-footer clearfix">
        Showing <b>1</b> to <b>1</b> of <b>1</b> entries<ul class="pagination pagination-sm no-margin pull-right">
            <!-- Previous Page Link -->
            <li class="page-item disabled"><span class="page-link">«</span></li>

            <!-- Pagination Elements -->
            <!-- "Three Dots" Separator -->

            <!-- Array Of Links -->
            <li class="page-item active"><span class="page-link">1</span></li>

            <!-- Next Page Link -->
            <li class="page-item disabled"><span class="page-link">»</span></li>
        </ul>

        <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">

            <small>Show</small>&nbsp;
            <select class="input-sm grid-per-pager" name="per-page">
                <option value="http://localhost:8000/admin/members?_pjax=%23pjax-container&amp;per_page=10">10</option>
                <option value="http://localhost:8000/admin/members?_pjax=%23pjax-container&amp;per_page=20" selected="">20</option>
                <option value="http://localhost:8000/admin/members?_pjax=%23pjax-container&amp;per_page=30">30</option>
                <option value="http://localhost:8000/admin/members?_pjax=%23pjax-container&amp;per_page=50">50</option>
                <option value="http://localhost:8000/admin/members?_pjax=%23pjax-container&amp;per_page=100">100</option>
            </select>
            &nbsp;<small>entries</small>
        </label>

    </div>
    <!-- /.box-body -->
</div>