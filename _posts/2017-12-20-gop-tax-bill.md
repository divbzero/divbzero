---
layout: post
title: GOP Tax Bill Favors the Rich and Married
tags: government tax data
---

What will be the actual impact of the GOP tax bill on what taxpayers owe?

The charts below show the *personal income tax* you’ll pay depending on your filing status and income — assuming that you have no children or other dependents and take the standard deduction.

<link rel="stylesheet" href="/taxman/nv.d3.css">

<style>
  .chart {
    width: 116%;
    margin: 0 -8% 4%;
  }

  .chart svg {
    height: 360px;
  }
  .chart svg text {
    fill: #555;
    font-family: "Gill Sans", "Gill Sans MT", "Helvetica Neue", "Segoe UI", Calibri, sans-serif;
    font-weight: 200;
  }
  .chart svg .tick text {
    font-size: 72%;
  }
  .chart svg .nv-axis path {
    stroke: #e5e5e5;
  }
  .chart svg text.nv-axislabel {
    font-size: 84%;
    font-weight: 600;
    letter-spacing: 0.01em;
    text-transform: uppercase;
  }

  .nvtooltip {
    font-family: "Gill Sans", "Gill Sans MT", "Helvetica Neue", "Segoe UI", Calibri, sans-serif;
  }
  .nvtooltip strong {
    font-weight: 600;
  }
  .nvtooltip table td.key {
    font-weight: 200;
  }
  .nvtooltip table td.value {
    font-weight: 600;
  }
</style>

#### Single

<div class="chart" id="single-chart"></div>

#### Married Filing Jointly

<div class="chart" id="joint-chart"></div>

#### Married Filing Separately

<div class="chart" id="separate-chart"></div>

#### Head of Household

<div class="chart" id="household-chart"></div>

<script src="/taxman/d3.js"></script>
<script src="/taxman/object.assign.js"></script>
<script src="/taxman/nv.d3.js"></script>
<script src="/taxman/taxman.data.js"></script>
<script src="/taxman/taxman.ui.js"></script>

<script>
  var valuesForStatus = {
    single: {
      'plan': '2017',
      'status': 'single',
      'income': '30000',
      'deduction-type': 'standard',
      'deduction': '6350',
      'dependents': '1',
      'exemption': '4050',
      'taxable-income': '19600',
      'tax': '2474',
    },
    joint: {
      'plan': '2017',
      'status': 'joint',
      'income': '30000',
      'deduction-type': 'standard',
      'deduction': '12700',
      'dependents': '2',
      'exemption': '8100',
      'taxable-income': '9200',
      'tax': '920',
    },
    separate: {
      'plan': '2017',
      'status': 'separate',
      'income': '30000',
      'deduction-type': 'standard',
      'deduction': '6350',
      'dependents': '1',
      'exemption': '4050',
      'taxable-income': '19600',
      'tax': '2474',
    },
    household: {
      'plan': '2017',
      'status': 'household',
      'income': '30000',
      'deduction-type': 'standard',
      'deduction': '9350',
      'dependents': '1',
      'exemption': '4050',
      'taxable-income': '16600',
      'tax': '1823',
    },
  };

  function renderChart(status) {
    var values = valuesForStatus[status], incomes = range(0, 410000, 10000), taxesByPlan = {};
    for (var plan in rates) {
      var valuesForPlan = Object.assign({}, values, {plan: plan});
      taxesByPlan[plan] = calculateTaxes(valuesForPlan, 'income', incomes);
    }
    updateChart('#' + status + '-chart', incomes, taxesByPlan, plans, colors);
  }

  renderChart('single');
  renderChart('joint');
  renderChart('separate');
  renderChart('household');
</script>

The charts reveal particularly large tax cuts for married couples whether they file jointly or separately. In addition, those tax cuts grow substantially larger for couples with higher incomes.

In short — if you’re rich and married, you’re in luck!

---

*For more on the tax bill, read about [how specific provisions will affect you](https://www.npr.org/2017/12/15/571258698/chart-how-the-new-version-of-the-republican-tax-bill-would-affect-you), [long-term economic effects](https://taxfoundation.org/final-tax-cuts-and-jobs-act-details-analysis/), and [the impact of the new territorial tax system](https://www.aboveavalon.com/notes/2017/12/12/the-end-to-apples-cash-dilemma).*

*Also feel free to [adjust the chart](/taxman) to fit your tax situation or [view the underlying code](https://github.com/divbzero/taxman).*

