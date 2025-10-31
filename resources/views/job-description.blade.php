<!-- resources/views/jd-dgm-accounts-finance.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Description - AKH Knitting & Dyeing Ltd.</title>
  <link rel="stylesheet" href="{{ asset('css/jd.css') }}" />
</head>
<body>
  <div class="jd-container">

    <!-- ====================== PAGE 1 ====================== -->
    <div class="jd-page">
      <div class="jd-header">
        <div class="brand-left">
          <img
            src="{{ asset('storage/logo.png') }}"
            onerror="this.onerror=null;this.src='{{ asset('storage/logo.png') }}';"
            alt="AKH Group"
            class="akh-logo"
          />
          <div class="company-name">AKH Knitting &amp; Dyeing Ltd.</div>
          <div class="company-address">92, Rajphulbaria, Tetuljhora, Savar, Dhaka-1347</div>
        </div>

        <div class="position-title">
          <div class="job-desc-title">JOB DESCRIPTION</div>
          <div>D.G.M. (ACCOUNTS &amp; FINANCE)</div>
        </div>

        <div class="page-info">Page 1 of 3</div>
      </div>

      <div class="jd-details bordered-box">
        <div class="detail-row">
          <div class="detail-label"><strong>JOB TITLE:</strong></div>
          <div class="detail-value">Deputy General Manager – Accounts &amp; Finance</div>
        </div>
        <div class="detail-row">
          <div class="detail-label"><strong>DEPARTMENT:</strong></div>
          <div class="detail-value">Accounts &amp; Finance</div>
        </div>
        <div class="detail-row">
          <div class="detail-label"><strong>JOB HOLDER:</strong></div>
          <div class="detail-value">Abul Basher</div>
        </div>
        <div class="detail-row">
          <div class="detail-label"><strong>REPORTS TO:</strong></div>
          <div class="detail-value">Head of Accounts &amp; Finance</div>
        </div>
      </div>

      <div class="purpose-section">
        <div class="section-title">PURPOSE:</div>
        <div class="purpose-text">
          Manages, supervises, and provides guidance to the Accounts &amp; Finance Department team to ensure effective financial stewardship and service delivery.
        </div>
      </div>

      <div class="organogram-section">
        <div class="section-title">ORGANOGRAM</div>
        <div class="organogram-img-wrap">
          <img
            src="{{ asset('storage/DGM.png') }}"
            onerror="this.onerror=null;this.src='{{ asset('storage/DGM.png') }}';"
            alt="Organogram"
            class="organogram-img"
          />
        </div>
      </div>

      <div class="accountability-section">
        <div class="section-title">KEY ACCOUNTABILITIES</div>
        <table class="accountability-table">
          <thead>
            <tr>
              <th width="5%">SN</th>
              <th width="55%">KEY ACCOUNTABILITIES</th>
              <th width="20%">KPI</th>
              <th width="20%">MEASUREMENTS</th>
            </tr>
          </thead>
          <tbody>
            @php
              $accountabilities = [
                [1, 'Manage, supervise, and guide the Accounts & Finance team.', 'Team performance and compliance', '≥ 95% team KPIs met'],
                [2, 'Conduct training to enhance team skills and knowledge.', 'No. of training sessions conducted annually', '≥ 4 sessions/year'],
                [3, 'Manage organizational cash flow and ensure liquidity.', 'Cash sufficiency and no fund shortage', '100% cash availability'],
                [4, 'Provide financial information to management by analysing accounting data and reports.', 'Accuracy and clarity of reports submitted', '≥ 98% report accuracy'],
                [5, 'Prepare balance sheet, P&amp;L, and other financial summaries.', 'Accuracy of financial statements', '≥ 98% audit compliance'],
                [6, 'Supervise timely reporting of weekly/monthly/quarterly/yearly accounts.', 'Timely report delivery against schedule', '100% reports on-time'],
                [7, 'Monitor expenditures and analyse revenue trends monthly.', 'Variance from budgeted vs. actual', '≤ 5% deviation'],
                [8, 'Approve vouchers and bills below 5000/- and ensure proper record-keeping.', 'Timeliness and accuracy of approvals', '100% timely within 24 hrs'],
                [9, 'Supervise accounts payable and receivable, including supplier and export payments.', 'Outstanding payable/receivable ratio', '≤ 5% overdue invoices'],
                [10, 'Verify documents and supervise monthly party payment proposals to MD.', 'On-time and error-free payment requests', '100% accurate submissions'],
                [11, 'Monitor transactions to ensure policy compliance and maintain general ledger accuracy.', 'Number of policy deviations detected', '≤ 2 deviations/month'],
                [12, 'Coordinate among department sections to complete assigned tasks.', 'Task completion and inter-department efficiency', '≥ 95% coordination effectiveness'],
                [13, 'Manage investments of surplus funds to generate returns.', 'ROI from investments', '≥ 5% annual return'],
                [14, 'Submit required financial reports to regulatory authorities on time.', 'On-time submission rate', '100% within deadlines'],
                [15, 'Ensure timely and accurate completion of all accounting transactions.', 'Monthly closing accuracy', '100% transaction closure'],
                [16, 'Closely monitor tax, VDS, TDS, and customs compliance.', 'Accuracy of returns and deductions', '100% compliance'],
                [17, 'Perform any other task as assigned by MD when necessary.', 'Timely and accurate task completion', '100% assigned task completion'],
                [18, 'Lead internal and external audits and implement audit recommendations.', 'Audit finding closure rate', '≥ 95% findings resolved within agreed timeframe'],
                [19, 'Coordinate with banks, tax authorities, and other financial institutions.', 'External stakeholder satisfaction', '≥ 90% positive feedback'],
                [20, 'Develop and enforce financial policies and internal controls.', 'Policy compliance rate', '100% adherence'],
                [21, 'Supervise AP/AR functions to optimize cash flow.', 'Receivables collection rate', '≥ 95% collected within terms'],
                [22, 'Manage budgeting, forecasting, and financial planning processes.', 'Budget adherence', '≤ 5% variance vs. approved budgets'],
              ];
            @endphp
            @foreach ($accountabilities as $acc)
              <tr>
                <td>{{ $acc[0] }}</td>
                <td>{!! $acc[1] !!}</td>
                <td>{{ $acc[2] }}</td>
                <td>{{ $acc[3] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="competencies-section">
        <div class="section-title">BEHAVIORAL COMPETENCIES</div>
        <table class="competencies-table">
          <thead>
            <tr>
              <th width="5%">SN</th>
              <th width="40%">COMPETENCIES</th>
              <th width="11%">LEVEL 1</th>
              <th width="11%">LEVEL 2</th>
              <th width="11%">LEVEL 3</th>
              <th width="11%">LEVEL 4</th>
              <th width="11%">LEVEL 5</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Leadership &amp; Supervision</td><td></td><td></td><td>X</td><td></td><td></td></tr>
            <tr><td>2</td><td>Cross-functional Coordination</td><td></td><td>X</td><td></td><td></td><td></td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ====================== PAGE 2 ====================== -->
    <div class="jd-page">
      <div class="jd-header">
        <div class="brand-left">
          <img
            src="{{ asset('storage/logo.png') }}"
            onerror="this.onerror=null;this.src='{{ asset('storage/logo.jpg') }}';"
            alt="AKH Group"
            class="akh-logo"
          />
          <div class="company-name">AKH Knitting &amp; Dyeing Ltd.</div>
          <div class="company-address">92, Rajphulbaria, Tetuljhora, Savar, Dhaka-1347</div>
        </div>
        <div class="position-title">
          <div class="job-desc-title">JOB DESCRIPTION</div>
          <div>D.G.M. (ACCOUNTS &amp; FINANCE)</div>
        </div>
        <div class="page-info">Page 2 of 3</div>
      </div>

      <div class="competencies-section">
        <div class="section-title">TECHNICAL COMPETENCIES</div>
        <table class="technical-table">
          <thead>
            <tr>
              <th width="5%">SN</th>
              <th width="50%">COMPETENCIES</th>
              <th width="15%">BASIC</th>
              <th width="15%">INTERMEDIATE</th>
              <th width="15%">ADVANCE</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Team Training &amp; Development</td><td></td><td>X</td><td></td></tr>
            <tr><td>2</td><td>Cash Flow Management</td><td></td><td></td><td>X</td></tr>
            <tr><td>3</td><td>Financial Analysis</td><td></td><td></td><td>X</td></tr>
            <tr><td>4</td><td>Financial Statements Preparation</td><td></td><td></td><td>X</td></tr>
            <tr><td>5</td><td>Report Management</td><td></td><td>X</td><td></td></tr>
            <tr><td>6</td><td>Cost &amp; Revenue Monitoring</td><td></td><td>X</td><td></td></tr>
            <tr><td>7</td><td>Transaction Authorization</td><td></td><td>X</td><td></td></tr>
            <tr><td>8</td><td>Payables &amp; Receivables Management</td><td></td><td></td><td>X</td></tr>
            <tr><td>9</td><td>Documentation</td><td></td><td>X</td><td></td></tr>
            <tr><td>10</td><td>Transactions Verification (Internal Control)</td><td></td><td>X</td><td></td></tr>
            <tr><td>11</td><td>Investment Decision Making</td><td></td><td></td><td>X</td></tr>
            <tr><td>12</td><td>Regulatory Reporting</td><td></td><td>X</td><td></td></tr>
            <tr><td>13</td><td>Transaction Oversight &amp; Closing</td><td></td><td>X</td><td></td></tr>
            <tr><td>14</td><td>Tax &amp; Statutory Compliance (VDS, TDS, Customs)</td><td></td><td></td><td>X</td></tr>
            <tr><td>15</td><td>Auditing &amp; Controls</td><td></td><td></td><td>X</td></tr>
            <tr><td>16</td><td>Stakeholder Coordination (Banks, Tax Authorities)</td><td></td><td>X</td><td></td></tr>
            <tr><td>17</td><td>Policy Development &amp; Internal Controls</td><td></td><td></td><td>X</td></tr>
            <tr><td>18</td><td>Financial Planning (Budgeting &amp; Forecasting)</td><td></td><td></td><td>X</td></tr>
          </tbody>
        </table>

        <div class="section-title">ENABLERS</div>
        <table class="technical-table">
          <thead>
            <tr>
              <th width="5%">SN</th>
              <th width="50%">ENABLERS</th>
              <th width="15%">BASIC</th>
              <th width="15%">INTERMEDIATE</th>
              <th width="15%">ADVANCE</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Microsoft Word</td><td>X</td><td></td><td></td></tr>
            <tr><td>2</td><td>Microsoft Excel</td><td></td><td></td><td>X</td></tr>
            <tr><td>3</td><td>Microsoft PowerPoint</td><td></td><td>X</td><td></td></tr>
            <tr><td>4</td><td>Microsoft Outlook</td><td></td><td>X</td><td></td></tr>
            <tr><td>5</td><td>ERP</td><td></td><td></td><td>X</td></tr>
            <tr><td>6</td><td>Reading</td><td></td><td>X</td><td></td></tr>
            <tr><td>7</td><td>Speaking</td><td></td><td>X</td><td></td></tr>
            <tr><td>8</td><td>Writing</td><td></td><td></td><td>X</td></tr>
          </tbody>
        </table>
      </div>
      <div class="signatures-section">
        <div class="signature-block">
          <div class="signature-line"></div>
          <div class="signature-name">Alook Bhattacharjee</div>
          <div class="signature-title">Sr. Manager - Human Resources</div>
          <div class="signature-label">Prepared By,</div>
        </div>

        <div class="signature-block">
          <div class="signature-line"></div>
          <div class="signature-name">Aruna Wijerathne</div>
          <div class="signature-title">Chief Human Resources Officer</div>
          <div class="signature-label">Reviewed By,</div>
        </div>

        <div class="signature-block">
          <div class="signature-line"></div>
          <div class="signature-name">Md. Shamsul Alam</div>
          <div class="signature-title">Managing Director</div>
          <div class="signature-label">Approved By,</div>
        </div>
      </div>

      <div class="confidential-footer">
        *This document is the property of AKH Knitting &amp; Dyeing Ltd. and the information contained herein is confidential. The person receiving this is responsible to maintain confidentiality except when absolutely necessary and should be consistent with the intended use.*
      </div>
    </div>

  <script src="{{ asset('js/jd.js') }}"></script>
</body>
</html>
