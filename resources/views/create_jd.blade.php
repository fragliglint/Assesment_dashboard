<!-- resources/views/create_jd.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Job Description - AKH Knitting & Dyeing Ltd.</title>

  <!-- Reuse your print styles for the live preview -->
  <link rel="stylesheet" href="{{ asset('css/jd.css') }}" />

  <style>
    /* Builder layout (responsive) */
    :root { --gap: 16px; }
    body { background:#f6f8fa; }
    .builder-wrap {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: var(--gap);
      padding: 16px;
      max-width: 1400px;
      margin: 0 auto;
    }
    @media (max-width: 1024px) { .builder-wrap { grid-template-columns: 1fr; } }
    .panel {
      background: #fff;
      border: 1px solid #e3e6eb;
      border-radius: 8px;
      overflow: hidden;
    }
    .panel h3 {
      margin: 0;
      padding: 12px 14px;
      font-size: 16px;
      border-bottom: 1px solid #e3e6eb;
      background: #fafbfc;
    }
    .panel-body { padding: 14px; }

    /* Form controls */
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }
    .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; }
    @media (max-width: 768px) {
      .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
    }
    .field { display: flex; flex-direction: column; gap: 6px; }
    .field label { font-weight: 600; font-size: 12px; color:#1f2937; }
    .field input[type="text"],
    .field input[type="number"],
    .field input[type="file"],
    .field textarea,
    .field select {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #cfd6dd;
      border-radius: 6px;
      font-size: 13px;
      outline: none;
      background: #fff;
    }
    .field textarea { min-height: 88px; resize: vertical; }

    .section-toggle {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      margin: 6px 0 10px 0;
    }

    .chips { display: flex; flex-wrap: wrap; gap: 8px; }
    .chip { border:1px solid #cfd6dd; border-radius: 999px; padding: 6px 10px; font-size: 12px; background:#f9fafb; }

    .table-lite { width: 100%; border-collapse: collapse; font-size: 12px; }
    .table-lite th, .table-lite td { border:1px solid #e5e7eb; padding:6px; vertical-align: top; }
    .table-lite th { background:#f3f4f6; text-align:left; font-weight:700; }
    .row-actions { display:flex; gap:6px; }

    .btn {
      display:inline-flex; align-items:center; justify-content:center; gap:6px;
      border:1px solid #cfd6dd; background:#fff; padding:8px 12px; border-radius:6px;
      font-size:13px; cursor:pointer;
    }
    .btn.primary { background:#0b2a57; color:#fff; border-color:#0b2a57; }
    .btn.success { background:#16a34a; color:#fff; border-color:#16a34a; }
    .btn.warn { background:#f59e0b; color:#fff; border-color:#f59e0b; }
    .btn.danger { background:#dc2626; color:#fff; border-color:#dc2626; }
    .btn.ghost { background:#fff; color:#111827; border-color:#cfd6dd; }
    .btn.sm { padding:6px 8px; font-size:12px; }

    .toolbar { display:flex; flex-wrap:wrap; gap:8px; margin-top: 8px; }
    .sticky-footer {
      position: sticky; bottom: 0; background:#fff; border-top:1px solid #e5e7eb;
      padding: 10px; display:flex; gap:8px; justify-content:flex-end;
    }

    /* Keep preview printable while fitting inside the panel */
    .preview-scroll { max-height: calc(100vh - 150px); overflow:auto; padding: 8px; background:#f9fafb; }
    .jd-container { width: 100%; max-width: 210mm; margin: 0 auto; }
  </style>
</head>
<body>

<div class="builder-wrap">

  <!-- LEFT: Builder Form -->
  <div class="panel">
    <h3>JD Builder</h3>
    <div class="panel-body">
      <form id="jdForm" method="POST" action="{{ route('jd.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="payload" id="payload" />

        <!-- Header is constant in preview; details are editable -->
        <div class="section-toggle" title="Header/Signatures/Footer are constant and always included">
          <input type="checkbox" checked disabled /> <span>Header, Signatures, Footer are fixed</span>
        </div>

        <div class="grid-2">
          <div class="field">
            <label>Job Title</label>
            <input type="text" id="f_job_title" value="Deputy General Manager – Accounts & Finance" placeholder="e.g., Deputy General Manager – Accounts & Finance" />
          </div>
          <div class="field">
            <label>Department</label>
            <input type="text" id="f_department" value="Accounts & Finance" placeholder="e.g., Accounts & Finance" />
          </div>
          <div class="field">
            <label>Job Holder</label>
            <input type="text" id="f_job_holder" value="Abul Basher" placeholder="Name" />
          </div>
          <div class="field">
            <label>Reports To</label>
            <input type="text" id="f_reports_to" value="Head of Accounts & Finance" placeholder="e.g., Head of Accounts & Finance" />
          </div>
        </div>

        <hr style="margin:14px 0; border:none; border-top:1px solid #e5e7eb;" />

        <!-- Purpose -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_purpose" checked />
          <label for="toggle_purpose">Include Purpose</label>
        </div>
        <div id="purpose_block">
          <div class="field">
            <label>Purpose</label>
            <textarea id="f_purpose">Manages, supervises, and provides guidance to the Accounts & Finance Department team to ensure effective financial stewardship and service delivery.</textarea>
          </div>
        </div>

        <!-- Organogram -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_organogram" checked />
          <label for="toggle_organogram">Include Organogram</label>
        </div>
        <div id="organogram_block" class="grid-2">
          <div class="field">
            <label>Organogram Image</label>
            <input type="file" id="f_organogram" accept="image/*" />
            <small>Optional: upload a replacement for the default image.</small>
          </div>
          <div class="field">
            <label>Fallback Path (optional)</label>
            <input type="text" id="f_organogram_path" value="{{ asset('storage/DGM.png') }}" />
          </div>
        </div>

        <hr style="margin:14px 0; border:none; border-top:1px solid #e5e7eb;" />

        <!-- Key Accountabilities -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_accountabilities" checked />
          <label for="toggle_accountabilities">Include Key Accountabilities</label>
        </div>

        <div id="accountabilities_block">
          <div class="toolbar">
            <button type="button" class="btn ghost sm" id="btn_select_all_acc">Select All</button>
            <button type="button" class="btn ghost sm" id="btn_clear_all_acc">Clear All</button>
            <button type="button" class="btn sm" id="btn_add_custom_acc">Add Custom</button>
          </div>

          <table class="table-lite" style="margin-top:8px;">
            <thead>
              <tr>
                <th width="4%">Use</th>
                <th width="40%">Key Accountability</th>
                <th width="18%">KPI</th>
                <th width="18%">Measurement</th>
                <th width="20%">Actions</th>
              </tr>
            </thead>
            <tbody id="acc_table_body">
              <!-- Rows are injected from defaultAcc list -->
            </tbody>
          </table>
        </div>

        <hr style="margin:14px 0; border:none; border-top:1px solid #e5e7eb;" />

        <!-- Behavioral Competencies -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_behavioral" checked />
          <label for="toggle_behavioral">Include Behavioral Competencies</label>
        </div>

        <div id="behavioral_block">
          <table class="table-lite">
            <thead>
              <tr>
                <th width="4%">Use</th>
                <th>Competency</th>
                <th width="40%">Level</th>
              </tr>
            </thead>
            <tbody id="behavioral_body">
              <!-- Built from defaultBehavioral -->
            </tbody>
          </table>
        </div>

        <hr style="margin:14px 0; border:none; border-top:1px solid #e5e7eb;" />

        <!-- Technical Competencies -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_technical" checked />
          <label for="toggle_technical">Include Technical Competencies</label>
        </div>
        <div id="technical_block">
          <table class="table-lite">
            <thead>
              <tr>
                <th width="4%">Use</th>
                <th>Competency</th>
                <th width="28%">Basic</th>
                <th width="28%">Intermediate</th>
                <th width="28%">Advance</th>
              </tr>
            </thead>
            <tbody id="technical_body">
              <!-- Built from defaultTechnical -->
            </tbody>
          </table>
        </div>

        <hr style="margin:14px 0; border:none; border-top:1px solid #e5e7eb;" />

        <!-- Enablers -->
        <div class="section-toggle">
          <input type="checkbox" id="toggle_enablers" checked />
          <label for="toggle_enablers">Include Enablers</label>
        </div>
        <div id="enablers_block">
          <table class="table-lite">
            <thead>
              <tr>
                <th width="4%">Use</th>
                <th>Enabler</th>
                <th width="28%">Basic</th>
                <th width="28%">Intermediate</th>
                <th width="28%">Advance</th>
              </tr>
            </thead>
            <tbody id="enablers_body">
              <!-- Built from defaultEnablers -->
            </tbody>
          </table>
        </div>

        <div class="sticky-footer">
          <button type="button" class="btn ghost" id="btn_save_draft">Save draft</button>
          <button type="button" class="btn warn" id="btn_clear_draft">Clear draft</button>
          <button type="submit" class="btn success">Save & Continue</button>
        </div>
      </form>
    </div>
  </div>

  <!-- RIGHT: Live Preview (using your JD styles) -->
  <div class="panel">
    <h3>Live Preview</h3>
    <div class="preview-scroll">
      <div class="jd-container">

        <!-- PAGE 1 -->
        <div class="jd-page" id="page1">
          <div class="jd-header">
            <div class="brand-left">
              <img
                id="preview_logo"
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
              <div id="preview_position_title">D.G.M. (ACCOUNTS &amp; FINANCE)</div>
            </div>

            <div class="page-info">Page 1 of 3</div>
          </div>

          <div class="jd-details bordered-box">
            <div class="detail-row">
              <div class="detail-label"><strong>JOB TITLE:</strong></div>
              <div class="detail-value" id="preview_job_title">Deputy General Manager – Accounts &amp; Finance</div>
            </div>
            <div class="detail-row">
              <div class="detail-label"><strong>DEPARTMENT:</strong></div>
              <div class="detail-value" id="preview_department">Accounts &amp; Finance</div>
            </div>
            <div class="detail-row">
              <div class="detail-label"><strong>JOB HOLDER:</strong></div>
              <div class="detail-value" id="preview_job_holder">Abul Basher</div>
            </div>
            <div class="detail-row">
              <div class="detail-label"><strong>REPORTS TO:</strong></div>
              <div class="detail-value" id="preview_reports_to">Head of Accounts &amp; Finance</div>
            </div>
          </div>

          <div class="purpose-section" id="preview_purpose_section">
            <div class="section-title">PURPOSE:</div>
            <div class="purpose-text" id="preview_purpose_text">
              Manages, supervises, and provides guidance to the Accounts &amp; Finance Department team to ensure effective financial stewardship and service delivery.
            </div>
          </div>

          <div class="organogram-section" id="preview_organogram_section">
            <div class="section-title">ORGANOGRAM</div>
            <div class="organogram-img-wrap">
              <img
                id="preview_organogram_img"
                src="{{ asset('storage/DGM.png') }}"
                onerror="this.onerror=null;this.src='{{ asset('storage/DGM.jpg') }}';"
                alt="Organogram"
                class="organogram-img"
              />
            </div>
          </div>

          <div class="accountability-section" id="preview_accountabilities_section">
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
              <tbody id="preview_acc_tbody">
                <!-- Filled from selection -->
              </tbody>
            </table>
          </div>

          <div class="competencies-section" id="preview_behavioral_section">
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
              <tbody id="preview_behavioral_tbody">
                <!-- Filled from selection -->
              </tbody>
            </table>
          </div>
        </div>

        <!-- PAGE 2 -->
        <div class="jd-page" id="page2">
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
              <div id="preview_position_title_2">D.G.M. (ACCOUNTS &amp; FINANCE)</div>
            </div>
            <div class="page-info">Page 2 of 3</div>
          </div>

          <div class="competencies-section" id="preview_technical_section">
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
              <tbody id="preview_technical_tbody">
                <!-- Filled from selection -->
              </tbody>
            </table>

            <div class="section-title" id="preview_enablers_title">ENABLERS</div>
            <table class="technical-table" id="preview_enablers_section">
              <thead>
                <tr>
                  <th width="5%">SN</th>
                  <th width="50%">ENABLERS</th>
                  <th width="15%">BASIC</th>
                  <th width="15%">INTERMEDIATE</th>
                  <th width="15%">ADVANCE</th>
                </tr>
              </thead>
              <tbody id="preview_enablers_tbody">
                <!-- Filled from selection -->
              </tbody>
            </table>
          </div>

          <!-- Signatures (constant) -->
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

      </div>
    </div>
  </div>

</div>

<script>
  // ---------- Defaults (same content you shared) ----------
  const defaultAcc = [
    { sn: 1,  text: 'Manage, supervise, and guide the Accounts & Finance team.', kpi: 'Team performance and compliance', measure: '≥ 95% team KPIs met', use: true },
    { sn: 2,  text: 'Conduct training to enhance team skills and knowledge.', kpi: 'No. of training sessions conducted annually', measure: '≥ 4 sessions/year', use: true },
    { sn: 3,  text: 'Manage organizational cash flow and ensure liquidity.', kpi: 'Cash sufficiency and no fund shortage', measure: '100% cash availability', use: true },
    { sn: 4,  text: 'Provide financial information to management by analysing accounting data and reports.', kpi: 'Accuracy and clarity of reports submitted', measure: '≥ 98% report accuracy', use: true },
    { sn: 5,  text: 'Prepare balance sheet, P&amp;L, and other financial summaries.', kpi: 'Accuracy of financial statements', measure: '≥ 98% audit compliance', use: true },
    { sn: 6,  text: 'Supervise timely reporting of weekly/monthly/quarterly/yearly accounts.', kpi: 'Timely report delivery against schedule', measure: '100% reports on-time', use: true },
    { sn: 7,  text: 'Monitor expenditures and analyse revenue trends monthly.', kpi: 'Variance from budgeted vs. actual', measure: '≤ 5% deviation', use: true },
    { sn: 8,  text: 'Approve vouchers and bills below 5000/- and ensure proper record-keeping.', kpi: 'Timeliness and accuracy of approvals', measure: '100% timely within 24 hrs', use: true },
    { sn: 9,  text: 'Supervise accounts payable and receivable, including supplier and export payments.', kpi: 'Outstanding payable/receivable ratio', measure: '≤ 5% overdue invoices', use: true },
    { sn: 10, text: 'Verify documents and supervise monthly party payment proposals to MD.', kpi: 'On-time and error-free payment requests', measure: '100% accurate submissions', use: true },
    { sn: 11, text: 'Monitor transactions to ensure policy compliance and maintain general ledger accuracy.', kpi: 'Number of policy deviations detected', measure: '≤ 2 deviations/month', use: true },
    { sn: 12, text: 'Coordinate among department sections to complete assigned tasks.', kpi: 'Task completion and inter-department efficiency', measure: '≥ 95% coordination effectiveness', use: true },
    { sn: 13, text: 'Manage investments of surplus funds to generate returns.', kpi: 'ROI from investments', measure: '≥ 5% annual return', use: true },
    { sn: 14, text: 'Submit required financial reports to regulatory authorities on time.', kpi: 'On-time submission rate', measure: '100% within deadlines', use: true },
    { sn: 15, text: 'Ensure timely and accurate completion of all accounting transactions.', kpi: 'Monthly closing accuracy', measure: '100% transaction closure', use: true },
    { sn: 16, text: 'Closely monitor tax, VDS, TDS, and customs compliance.', kpi: 'Accuracy of returns and deductions', measure: '100% compliance', use: true },
    { sn: 17, text: 'Perform any other task as assigned by MD when necessary.', kpi: 'Timely and accurate task completion', measure: '100% assigned task completion', use: true },
    { sn: 18, text: 'Lead internal and external audits and implement audit recommendations.', kpi: 'Audit finding closure rate', measure: '≥ 95% findings resolved within agreed timeframe', use: true },
    { sn: 19, text: 'Coordinate with banks, tax authorities, and other financial institutions.', kpi: 'External stakeholder satisfaction', measure: '≥ 90% positive feedback', use: true },
    { sn: 20, text: 'Develop and enforce financial policies and internal controls.', kpi: 'Policy compliance rate', measure: '100% adherence', use: true },
    { sn: 21, text: 'Supervise AP/AR functions to optimize cash flow.', kpi: 'Receivables collection rate', measure: '≥ 95% collected within terms', use: true },
    { sn: 22, text: 'Manage budgeting, forecasting, and financial planning processes.', kpi: 'Budget adherence', measure: '≤ 5% variance vs. approved budgets', use: true }
  ];

  const defaultBehavioral = [
    { name: 'Leadership & Supervision', level: 3, use: true },
    { name: 'Cross-functional Coordination', level: 2, use: true }
  ];

  const defaultTechnical = [
    { name: 'Team Training & Development', basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Cash Flow Management',       basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Financial Analysis',         basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Financial Statements Preparation', basic:false, intermediate:false, advance:true, use:true },
    { name: 'Report Management',          basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Cost & Revenue Monitoring',  basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Transaction Authorization',  basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Payables & Receivables Management', basic:false, intermediate:false, advance:true, use:true },
    { name: 'Documentation',              basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Transactions Verification (Internal Control)', basic:false, intermediate:true, advance:false, use:true },
    { name: 'Investment Decision Making', basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Regulatory Reporting',       basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Transaction Oversight & Closing', basic:false, intermediate:true, advance:false, use:true },
    { name: 'Tax & Statutory Compliance (VDS, TDS, Customs)', basic:false, intermediate:false, advance:true, use:true },
    { name: 'Auditing & Controls',        basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Stakeholder Coordination (Banks, Tax Authorities)', basic:false, intermediate:true, advance:false, use:true },
    { name: 'Policy Development & Internal Controls', basic:false, intermediate:false, advance:true, use:true },
    { name: 'Financial Planning (Budgeting & Forecasting)', basic:false, intermediate:false, advance:true, use:true }
  ];

  const defaultEnablers = [
    { name: 'Microsoft Word',        basic:true,  intermediate:false, advance:false, use:true },
    { name: 'Microsoft Excel',       basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Microsoft PowerPoint',  basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Microsoft Outlook',     basic:false, intermediate:true,  advance:false, use:true },
    { name: 'ERP',                   basic:false, intermediate:false, advance:true,  use:true },
    { name: 'Reading',               basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Speaking',              basic:false, intermediate:true,  advance:false, use:true },
    { name: 'Writing',               basic:false, intermediate:false, advance:true,  use:true }
  ];

  // ---------- State ----------
  let accList = JSON.parse(JSON.stringify(defaultAcc));
  let behList = JSON.parse(JSON.stringify(defaultBehavioral));
  let techList = JSON.parse(JSON.stringify(defaultTechnical));
  let enaList = JSON.parse(JSON.stringify(defaultEnablers));

  const q = (sel) => document.querySelector(sel);
  const qa = (sel) => Array.from(document.querySelectorAll(sel));

  // ---------- Build Form Tables ----------
  function renderAccTable() {
    const tbody = q('#acc_table_body');
    tbody.innerHTML = '';
    accList.forEach((row, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="checkbox" class="acc-use" data-idx="${idx}" ${row.use ? 'checked':''}></td>
        <td>
          <textarea class="acc-text" data-idx="${idx}">${decodeHtml(row.text)}</textarea>
        </td>
        <td><input type="text" class="acc-kpi" data-idx="${idx}" value="${sanitize(row.kpi)}"></td>
        <td><input type="text" class="acc-measure" data-idx="${idx}" value="${sanitize(row.measure)}"></td>
        <td class="row-actions">
          <button type="button" class="btn sm ghost acc-up" data-idx="${idx}">Up</button>
          <button type="button" class="btn sm ghost acc-down" data-idx="${idx}">Down</button>
          <button type="button" class="btn sm danger acc-del" data-idx="${idx}">Remove</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function renderBehavioral() {
    const tbody = q('#behavioral_body');
    tbody.innerHTML = '';
    behList.forEach((row, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="checkbox" class="beh-use" data-idx="${idx}" ${row.use?'checked':''}></td>
        <td>${sanitize(row.name)}</td>
        <td>
          <div class="chips">
            ${[1,2,3,4,5].map(l => `
              <label class="chip">
                <input type="radio" name="beh_${idx}_level" class="beh-level" data-idx="${idx}" value="${l}" ${row.level===l?'checked':''}>
                L${l}
              </label>
            `).join('')}
          </div>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function renderTechnical() {
    const tbody = q('#technical_body');
    tbody.innerHTML = '';
    techList.forEach((row, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="checkbox" class="tech-use" data-idx="${idx}" ${row.use?'checked':''}></td>
        <td>${sanitize(row.name)}</td>
        <td style="text-align:center;"><input type="checkbox" class="tech-basic" data-idx="${idx}" ${row.basic?'checked':''}></td>
        <td style="text-align:center;"><input type="checkbox" class="tech-intermediate" data-idx="${idx}" ${row.intermediate?'checked':''}></td>
        <td style="text-align:center;"><input type="checkbox" class="tech-advance" data-idx="${idx}" ${row.advance?'checked':''}></td>
      `;
      tbody.appendChild(tr);
    });
  }

  function renderEnablers() {
    const tbody = q('#enablers_body');
    tbody.innerHTML = '';
    enaList.forEach((row, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="checkbox" class="ena-use" data-idx="${idx}" ${row.use?'checked':''}></td>
        <td>${sanitize(row.name)}</td>
        <td style="text-align:center;"><input type="checkbox" class="ena-basic" data-idx="${idx}" ${row.basic?'checked':''}></td>
        <td style="text-align:center;"><input type="checkbox" class="ena-intermediate" data-idx="${idx}" ${row.intermediate?'checked':''}></td>
        <td style="text-align:center;"><input type="checkbox" class="ena-advance" data-idx="${idx}" ${row.advance?'checked':''}></td>
      `;
      tbody.appendChild(tr);
    });
  }

  // ---------- Live Preview Builders ----------
  function updateHeaderDetails() {
    q('#preview_job_title').textContent = q('#f_job_title').value || '';
    q('#preview_department').textContent = q('#f_department').value || '';
    q('#preview_job_holder').textContent = q('#f_job_holder').value || '';
    q('#preview_reports_to').textContent = q('#f_reports_to').value || '';

    const posTitle = q('#f_job_title').value || 'D.G.M. (ACCOUNTS & FINANCE)';
    q('#preview_position_title').textContent = toUpperTitle(posTitle);
    q('#preview_position_title_2').textContent = toUpperTitle(posTitle);
  }

  function updatePurpose() {
    const on = q('#toggle_purpose').checked;
    q('#preview_purpose_section').style.display = on ? '' : 'none';
    q('#preview_purpose_text').textContent = q('#f_purpose').value || '';
  }

  function updateOrganogram() {
    const on = q('#toggle_organogram').checked;
    q('#preview_organogram_section').style.display = on ? '' : 'none';
    const path = q('#f_organogram_path').value.trim();
    if (path) q('#preview_organogram_img').src = path;
  }

  function updateAccountabilities() {
    const on = q('#toggle_accountabilities').checked;
    q('#preview_accountabilities_section').style.display = on ? '' : 'none';

    const tbody = q('#preview_acc_tbody');
    tbody.innerHTML = '';
    let sn = 1;
    accList.forEach(r => {
      if (!r.use) return;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${sn++}</td>
        <td>${r.text}</td>
        <td>${escapeHtml(r.kpi||'')}</td>
        <td>${escapeHtml(r.measure||'')}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  function updateBehavioral() {
    const on = q('#toggle_behavioral').checked;
    q('#preview_behavioral_section').style.display = on ? '' : 'none';

    const tbody = q('#preview_behavioral_tbody');
    tbody.innerHTML = '';
    let sn = 1;
    behList.forEach(r => {
      if (!r.use) return;
      const tds = [1,2,3,4,5].map(l => `<td style="text-align:center;">${r.level===l?'X':''}</td>`).join('');
      const tr = document.createElement('tr');
      tr.innerHTML = `<td>${sn++}</td><td>${escapeHtml(r.name)}</td>${tds}`;
      tbody.appendChild(tr);
    });
  }

  function updateTechnical() {
    const on = q('#toggle_technical').checked;
    q('#preview_technical_section').style.display = on ? '' : 'none';

    const tbody = q('#preview_technical_tbody');
    tbody.innerHTML = '';
    let sn = 1;
    techList.forEach(r => {
      if (!r.use) return;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${sn++}</td>
        <td>${escapeHtml(r.name)}</td>
        <td style="text-align:center;">${r.basic?'X':''}</td>
        <td style="text-align:center;">${r.intermediate?'X':''}</td>
        <td style="text-align:center;">${r.advance?'X':''}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  function updateEnablers() {
    const on = q('#toggle_enablers').checked;
    q('#preview_enablers_title').style.display = on ? '' : 'none';
    q('#preview_enablers_section').style.display = on ? '' : 'none';

    const tbody = q('#preview_enablers_tbody');
    tbody.innerHTML = '';
    let sn = 1;
    enaList.forEach(r => {
      if (!r.use) return;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${sn++}</td>
        <td>${escapeHtml(r.name)}</td>
        <td style="text-align:center;">${r.basic?'X':''}</td>
        <td style="text-align:center;">${r.intermediate?'X':''}</td>
        <td style="text-align:center;">${r.advance?'X':''}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  // ---------- Wiring ----------
  function bindAccTableEvents() {
    q('#acc_table_body').addEventListener('input', (e) => {
      const idx = +e.target.dataset.idx;
      if (e.target.classList.contains('acc-text')) accList[idx].text = encodeHtml(e.target.value);
      if (e.target.classList.contains('acc-kpi')) accList[idx].kpi = e.target.value;
      if (e.target.classList.contains('acc-measure')) accList[idx].measure = e.target.value;
      updateAccountabilities();
      autosave();
    });
    q('#acc_table_body').addEventListener('change', (e) => {
      const idx = +e.target.dataset.idx;
      if (e.target.classList.contains('acc-use')) accList[idx].use = e.target.checked;
      updateAccountabilities();
      autosave();
    });
    q('#acc_table_body').addEventListener('click', (e) => {
      const idx = +e.target.dataset.idx;
      if (e.target.classList.contains('acc-up') && idx > 0) {
        [accList[idx-1], accList[idx]] = [accList[idx], accList[idx-1]];
        renumberAcc();
        renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
      }
      if (e.target.classList.contains('acc-down') && idx < accList.length-1) {
        [accList[idx+1], accList[idx]] = [accList[idx], accList[idx+1]];
        renumberAcc();
        renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
      }
      if (e.target.classList.contains('acc-del')) {
        accList.splice(idx,1);
        renumberAcc();
        renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
      }
    });
    q('#btn_select_all_acc').addEventListener('click', () => {
      accList.forEach(r => r.use = true);
      renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
    });
    q('#btn_clear_all_acc').addEventListener('click', () => {
      accList.forEach(r => r.use = false);
      renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
    });
    q('#btn_add_custom_acc').addEventListener('click', () => {
      accList.push({
        sn: accList.length+1,
        text: 'Custom accountability item',
        kpi: '',
        measure: '',
        use: true
      });
      renderAccTable(); bindAccTableEvents(); updateAccountabilities(); autosave();
    });
  }

  function renumberAcc() { accList.forEach((r, i) => r.sn = i+1); }

  function bindBehavioralEvents() {
    q('#behavioral_body').addEventListener('change', (e) => {
      const idx = +e.target.dataset.idx;
      if (e.target.classList.contains('beh-use')) behList[idx].use = e.target.checked;
      if (e.target.classList.contains('beh-level')) behList[idx].level = +e.target.value;
      updateBehavioral(); autosave();
    });
  }

  function bindTechnicalEvents() {
    q('#technical_body').addEventListener('change', (e) => {
      const idx = +e.target.dataset.idx;
      const r = techList[idx];
      if (e.target.classList.contains('tech-use')) r.use = e.target.checked;
      if (e.target.classList.contains('tech-basic')) r.basic = e.target.checked;
      if (e.target.classList.contains('tech-intermediate')) r.intermediate = e.target.checked;
      if (e.target.classList.contains('tech-advance')) r.advance = e.target.checked;
      updateTechnical(); autosave();
    });
  }

  function bindEnablersEvents() {
    q('#enablers_body').addEventListener('change', (e) => {
      const idx = +e.target.dataset.idx;
      const r = enaList[idx];
      if (e.target.classList.contains('ena-use')) r.use = e.target.checked;
      if (e.target.classList.contains('ena-basic')) r.basic = e.target.checked;
      if (e.target.classList.contains('ena-intermediate')) r.intermediate = e.target.checked;
      if (e.target.classList.contains('ena-advance')) r.advance = e.target.checked;
      updateEnablers(); autosave();
    });
  }

  // Basic sanitizers
  function sanitize(s){ return (s??'').toString().replace(/</g,'&lt;').replace(/>/g,'&gt;'); }
  function escapeHtml(s){ return sanitize(s); }
  function encodeHtml(s){ return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }
  function decodeHtml(s){ const d = document.createElement('textarea'); d.innerHTML=s; return d.value; }
  function toUpperTitle(s){ return (s||'').toUpperCase(); }

  // Toggle blocks + live handlers
  function bindGeneral() {
    ['f_job_title','f_department','f_job_holder','f_reports_to'].forEach(id => {
      q('#'+id).addEventListener('input', () => { updateHeaderDetails(); autosave(); });
    });
    q('#f_purpose').addEventListener('input', () => { updatePurpose(); autosave(); });
    q('#f_organogram_path').addEventListener('input', () => { updateOrganogram(); autosave(); });
    q('#f_organogram').addEventListener('change', (e) => {
      const file = e.target.files?.[0]; if (!file) return;
      const reader = new FileReader();
      reader.onload = () => { q('#preview_organogram_img').src = reader.result; autosave(); };
      reader.readAsDataURL(file);
    });

    q('#toggle_purpose').addEventListener('change', ()=>{ updatePurpose(); autosave(); });
    q('#toggle_organogram').addEventListener('change', ()=>{ updateOrganogram(); autosave(); });
    q('#toggle_accountabilities').addEventListener('change', ()=>{ updateAccountabilities(); autosave(); });
    q('#toggle_behavioral').addEventListener('change', ()=>{ updateBehavioral(); autosave(); });
    q('#toggle_technical').addEventListener('change', ()=>{ updateTechnical(); autosave(); });
    q('#toggle_enablers').addEventListener('change', ()=>{ updateEnablers(); autosave(); });

    // Draft save/clear
    q('#btn_save_draft').addEventListener('click', ()=>{ autosave(true); alert('Draft saved'); });
    q('#btn_clear_draft').addEventListener('click', ()=>{ localStorage.removeItem('jd_builder'); alert('Draft cleared'); });

    // Submit -> serialize payload JSON
    q('#jdForm').addEventListener('submit', (e) => {
      const payload = collectPayload();
      q('#payload').value = JSON.stringify(payload);
      // Allow form submission to continue with file upload if any.
    });
  }

  function collectPayload() {
    return {
      job_title: q('#f_job_title').value,
      department: q('#f_department').value,
      job_holder: q('#f_job_holder').value,
      reports_to: q('#f_reports_to').value,
      include: {
        purpose: q('#toggle_purpose').checked,
        organogram: q('#toggle_organogram').checked,
        accountabilities: q('#toggle_accountabilities').checked,
        behavioral: q('#toggle_behavioral').checked,
        technical: q('#toggle_technical').checked,
        enablers: q('#toggle_enablers').checked
      },
      purpose: q('#f_purpose').value,
      organogram_path: q('#f_organogram_path').value,
      accountabilities: accList.map(r => ({...r})),
      behavioral: behList.map(r => ({...r})),
      technical: techList.map(r => ({...r})),
      enablers: enaList.map(r => ({...r}))
    };
  }

  // ---------- Autosave (localStorage) ----------
  function autosave(force=false){
    const data = collectPayload();
    try {
      localStorage.setItem('jd_builder', JSON.stringify(data));
      if (force) console.log('Draft saved');
    } catch(e) { console.warn('Autosave failed', e); }
  }

  function loadDraft(){
    try {
      const saved = localStorage.getItem('jd_builder');
      if (!saved) return;
      const d = JSON.parse(saved);

      q('#f_job_title').value = d.job_title || '';
      q('#f_department').value = d.department || '';
      q('#f_job_holder').value = d.job_holder || '';
      q('#f_reports_to').value = d.reports_to || '';

      q('#toggle_purpose').checked = !!d?.include?.purpose;
      q('#toggle_organogram').checked = !!d?.include?.organogram;
      q('#toggle_accountabilities').checked = !!d?.include?.accountabilities;
      q('#toggle_behavioral').checked = !!d?.include?.behavioral;
      q('#toggle_technical').checked = !!d?.include?.technical;
      q('#toggle_enablers').checked = !!d?.include?.enablers;

      q('#f_purpose').value = d.purpose || '';
      q('#f_organogram_path').value = d.organogram_path || q('#f_organogram_path').value;

      if (Array.isArray(d.accountabilities)) accList = d.accountabilities;
      if (Array.isArray(d.behavioral)) behList = d.behavioral;
      if (Array.isArray(d.technical)) techList = d.technical;
      if (Array.isArray(d.enablers)) enaList = d.enablers;
    } catch(e) {
      console.warn('Failed to load draft', e);
    }
  }

  // ---------- Init ----------
  function init() {
    // Build tables
    renderAccTable(); bindAccTableEvents();
    renderBehavioral(); bindBehavioralEvents();
    renderTechnical(); bindTechnicalEvents();
    renderEnablers(); bindEnablersEvents();

    bindGeneral();
    updateHeaderDetails();
    updatePurpose();
    updateOrganogram();
    updateAccountabilities();
    updateBehavioral();
    updateTechnical();
    updateEnablers();
  }

  // Try load draft first, then render
  loadDraft();
  init();
</script>

</body>
</html>
