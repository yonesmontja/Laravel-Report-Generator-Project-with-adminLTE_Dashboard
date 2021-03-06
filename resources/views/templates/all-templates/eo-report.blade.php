<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>EO Report</title>
</head>

<body>

  <div class="container-fluid">
    <div class="row text-primary border border-dark border-2">
      <h2 class="text-center pt-2 pb-3 text-primary">
        {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Company Name')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

      </h2>
      <div class="col-3 text-center d-flex justify-content-center align-items-center">
        <img src="{{ 
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Logo URL')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}" alt="Company Logo" class="rounded-circle shadow mb-2" width="70">

      </div>
      <div class="col-3 d-flex justify-content-center align-items-center">
        <h6>
          Address 1: <span class="fw-normal">
            {{
            $reportUserData
            ->where('report_type_id',
            $reportType
              ->where('name', 'Address 1')
              ->first()
              ->id)
              ->where('report_user_id', $reportUserData
              ->first()
              ->report_user_id)
              ->first()
              ->value
              }}
          </span>

          <br>

          Address 2: <span class="fw-normal">
            {{
            $reportUserData
            ->where('report_type_id',
            $reportType
              ->where('name', 'Address 2')
              ->first()
              ->id)
              ->where('report_user_id', $reportUserData
              ->first()
              ->report_user_id)
              ->first()
              ->value
              }}
          </span>

        </h6>
      </div>
      <div class="col-3 d-flex justify-content-center align-items-center">
        <h6 class="text-start">
          Phone:
          <span class="fw-normal">
            {{
            $reportUserData
            ->where('report_type_id',
            $reportType
              ->where('name', 'Phone')
              ->first()
              ->id)
              ->where('report_user_id', $reportUserData
              ->first()
              ->report_user_id)
              ->first()
              ->value
              }}
          </span>

          <br>

          Fax:
          <span class="fw-normal">
            {{
            $reportUserData
            ->where('report_type_id',
            $reportType
              ->where('name', 'Fax')
              ->first()
              ->id)
              ->where('report_user_id', $reportUserData
              ->first()
              ->report_user_id)
              ->first()
              ->value
              }}
          </span>

        </h6>
      </div>
      <div class="col-3 text-center d-flex justify-content-center align-items-center">
        <h6>

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Website')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

          </h5>
      </div>
    </div>


    <div class="row">
      <h5 class="col-6 text-end py-3">Purchase Order @if ($isChineseEnabled) ???????????? @endif() </h5>
      <h6 class="col-6 text-end py-3 pe-0">
        Project Reference Number @if ($isChineseEnabled) ?????????: @endif()
        <span class="border border-dark px-2 py-1">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Project Reference Number')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </span>
      </h6>
    </div>


    <div class="row">
      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          PO NO. @if ($isChineseEnabled) ???????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'PO NO')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          PO Date @if ($isChineseEnabled)??????????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'PO Date')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Vendor @if ($isChineseEnabled) ????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Vendor')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Delivery Date @if ($isChineseEnabled) ???????????????????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Delivery Date')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Vendor Address @if ($isChineseEnabled) ????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Vendor Address')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Delivery Address @if ($isChineseEnabled) ??????????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Delivery Address')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Contact person @if ($isChineseEnabled) ???????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Contact Person')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Buyer Contact person @if ($isChineseEnabled) ?????????????????? @endif()
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Buyer Contact Person')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Phone @if ($isChineseEnabled) ?????? @endif() 1???
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Phone 1')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          Phone @if ($isChineseEnabled) ?????? @endif() 2???
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Phone 2')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          @if ($isChineseEnabled) ?????? @endif() :
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          @if ($isChineseEnabled) ?????? @endif() :
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

        </div>
      </div>

      <div class="col-5 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          E-mail @if ($isChineseEnabled) ?????? @endif() 1???
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Email 1')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>
      <div class="col-7 d-flex px-0">
        <div class="w-50 fw-bold py-1 ps-1 justify-center border border-dark border-end-0 border-bottom-0">
          E-mail @if ($isChineseEnabled) ?????? @endif 2???
        </div>
        <div class="w-50 py-1 ps-1 justify-center border border-dark border-bottom-0">

          {{
          $reportUserData
          ->where('report_type_id',
          $reportType
            ->where('name', 'Email 2')
            ->first()
            ->id)
            ->where('report_user_id', $reportUserData
            ->first()
            ->report_user_id)
            ->first()
            ->value 
            }}

        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-5 d-flex px-0">
        <div class="col-1 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          Line Item . @if ($isChineseEnabled) ?????? @endif
        </div>
        <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          @if ($isChineseEnabled) ??????????????????/ @endif PART NO.
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          QTY @if ($isChineseEnabled) ?????? @endif
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          UNIT @if ($isChineseEnabled) ?????? @endif
        </div>
      </div>

      <div class="col-7 d-flex px-0">
        <div class="w-50 d-flex">
          <div class="w-50 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            Free Spare parts @if ($isChineseEnabled) ???????????? @endif ???Qty @if ($isChineseEnabled) /?????? @endif ???
          </div>
          <div class="w-50 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            Drawing number @if ($isChineseEnabled) ?????? @endif
          </div>
          <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            Description @if ($isChineseEnabled) ?????? @endif
          </div>
        </div>
        <div class="w-50 d-flex px-0">
          <div class="col-7 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            PRICE @if ($isChineseEnabled) ?????? @endif
          </div>
          <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark">
            Line Item Total @if ($isChineseEnabled) ?????? @endif
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-12 fw-bold text-center justify-content-center align-items-center py-2 border border-dark border-top-0 border-bottom-0">
        EXAMPLE BELOW</div>
    </div>


    <div class="row">
      <div class="col-5 d-flex px-0">
        <div class="col-1 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          1</div>
        <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          XYZ-123</div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          #</div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
          #</div>
      </div>

      <div class="col-7 d-flex px-0">
        <div class="w-50 d-flex px-0">
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            None Included</div>
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            XYZ-333 Rev 7</div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            EXAMPLE: ABC Kit. # units to a pack. # packs per master carton, # master cartons per pallet, #
            pallets per
            40ft container
          </div>
        </div>
        <div class="w-50 d-flex px-0">
          <div class="col-7 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0">
            ???2.500
          </div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark">
            #VALUE!</div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-5 d-flex px-0">
        <div class="col-1 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          2</div>
        <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
      </div>

      <div class="col-7 d-flex px-0">
        <div class="w-50 d-flex px-0">
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
        </div>
        <div class="w-50 d-flex px-0">
          <div class="col-7 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-top-0">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-5 d-flex px-0">
        <div class="col-1 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          3</div>
        <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
        <div class="col-3 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
        </div>
      </div>

      <div class="col-7 d-flex px-0">
        <div class="w-50 d-flex px-0">
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="w-50 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
        </div>
        <div class="w-50 d-flex px-0">
          <div class="col-7 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
          </div>
          <div class="col-5 d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-top-0">
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-5"></div>

      <div class="col-7 d-flex px-0">
        <div class="w-50 d-flex px-0">
          <div class="w-100"></div>
          <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-end-0 border-top-0">
            Currency @if ($isChineseEnabled) ?????? @endif
          </div>
        </div>

        <div class="w-50 d-flex px-0">
          <div class="col-7 fw-bold d-flex justify-content-center align-items-center text-center border border-dark border-end-0 border-top-0">
            <div class="w-50 border-end border-dark">RMB</div>
            <div class="w-50">Total @if ($isChineseEnabled) ?????? @endif :</div>
          </div>
          <div class="col-5 fw-bold d-flex justify-content-center align-items-center text-center px-1 py-1 border border-dark border-top-0">#VALUE!</div>
        </div>

      </div>
    </div>

    <div class="row my-2">
      <div class="col-7"></div>
      <div class="col-5 d-flex px-2">
        Payment may be made in USD based on USD-RMB exchange rate at date TT is recieved by supplier.
      </div>
    </div>


    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Terms of trade @if ($isChineseEnabled) ???????????? @endif <br> (fob, cif, exw???)
      </div>
      <div class="col-1 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        FOB Shenzhen</div>
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Payment Terms @if ($isChineseEnabled) ???????????? @endif ???
      </div>
      <div class="col-4 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        30% deposit with PO, 70% after 3PQC and provision of shipping documents</div>
      <div class="col-1 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Warranty Period @if ($isChineseEnabled) <br> (????????????@endif </div>
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        1 year from ship date</div>
    </div>


    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Burden Bank Fees TT @if ($isChineseEnabled) ???????????? @endif ???
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        Outbound bank fees (including outbound bank's appointed intermediary banks) are responsibility of Buyer, Inbound fees responsibility of Suppliers
        @if ($isChineseEnabled)
        <br>
        ?????????????????????????????????????????????;????????????????????????????????????????????????. ??????(USD)????????????????????????
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Tooling Ownership Details
        @if ($isChineseEnabled)
        <br>
        ?????????????????????
        @endif
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        After Buyer pays 100% of the tooling cost, the tooling belongs to Buyer and Buyer retains the right to pick up tooling at their request. The tool should be in good work condition,no repair needed, and the mold should include all fittings needed to use the mold.
        @if ($isChineseEnabled)
        <br>
        ??????????????????????????? ??????????????????????????? ??????????????? ????????????????????????????????? ???????????????????????????????????????????????? ??????????????? ??????????????????????????????????????????
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Penalty for Missed Lead Time on Order: @if ($isChineseEnabled) ??????????????????????????????????????? @endif
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        Supplier will discount 2% of PO value for each week delivery is missed??? Order may be cancelled at Buyer's discretion ???and payments returned to buyer ???if order is not delivered by (date) 1.
        @if ($isChineseEnabled) ???????????????????????????????????????,????????????PO?????????2%
        <br>
        ???????????????2.???????????????????????????????????????,????????????????????????,??????????????????????????????????????????????????????.
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Defect Product Management @if ($isChineseEnabled) <br> ??????????????? @endif
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        Buyer expects 100% conformance to agreed quality standards. When Buyer finds defect product over AQL II rate, Supplier should take one of these actions: 1) Buyer returns whole batch to Supplier and Supplier reworks or replaces defects and sends good batch back to Buyer within XX days; 2) For urgent cases, Buyer can help to sort and transfer the labor cost to Supplier, but Supplier needs to replace the defect products within XX days. If the replacement goods are delivered to Buyer after that original deadline has passed, Supplier will discount X% of PO value for each week/ day they are late; 3) If defects are substantial, over standard AQL II, order may be cancelled at Buyer's discretion (and payments returned to Buyer)
        @if ($isChineseEnabled)
        <br>
        ????????????????????????100%?????????????????????????????????????????????????????????????????????AQL??????????????????????????????????????????1??????????????????????????????????????????????????????__ ???????????????????????????????????????2?????????????????????????????????????????????????????????????????????????????????????????????__ ????????????????????????????????????????????????????????????????????????????????????????????????????????????PO?????????2% ???????????????3???????????????????????????????????????????????????AQL?????????????????????????????????,??????????????????????????????????????????????????????.
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Buyer IQC standard @if ($isChineseEnabled) <br> (?????????????????????@endif
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
        Buyer will send the IQC standards with PO to Supplier for reference. Supplier needs to sign and return the IQC standards.
        @if ($isChineseEnabled)
        <br>
        ?????????????????????????????????????????????????????????????????????????????????????????????????????????
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0 border-end-0">
        Required documentation to be provided by supplier in advance of shipment release. The sample/ form / template of these desired documents should be attached to this PO.
        @if ($isChineseEnabled) &nbsp;&nbsp;&nbsp; ????????????:
        <br>
        1.??????????????????????????????????????????; 2.???PO??????????????????????????????????????????
        @endif

      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark border-bottom-0">
      </div>
    </div>

    <div class="row">
      <div class="col-2 d-flex align-items-center px-1 py-1 border border-dark border-end-0">
        <pre>Hotline for supplier @if ($isChineseEnabled) <br>??????????????? @endif </pre>
      </div>
      <div class="col-10 d-flex align-items-center px-1 py-1 border border-dark">
        Buyer is committed to being professional and fair with our suppliers. However, if you feel you have been mistreated by an employee of ours, you are encouraged to email your concerns in Chinese or English to complaints@XXXXX.com. This email goes directly to the office of our GM. As a fundamental rule, buyer's employees are prohibited from receiving commissions or special payments from our suppliers. If you are asked about these things, please contact complaints@XXXXX.com immediately.
        <br>
        COMPANY NAME
        @if ($isChineseEnabled)
        <br>
        ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????complaints@XXXXX.com.?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????complaints@XXXXX.com. ??????????????????
        @endif
      </div>
    </div>


    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center pt-2 pb-5">
        <h4> Buyer Signature @if ($isChineseEnabled) ???????????? @endif</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center">
        <h4 class="border-top border-bottom border-dark pt-2 pb-5"> Vendor Signature and Company Chop @if ($isChineseEnabled) ?????????????????? @endif</h4>
      </div>
    </div>


  </div> <!-- Main div ends here -->


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>
