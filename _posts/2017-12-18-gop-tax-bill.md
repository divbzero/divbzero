---
layout: post
title: GOP Tax Bill Favors the Rich and Married
tags: government tax data
---

After months of back and forth we finally have a full GOP tax bill on the table — reconciled between House and Senate and ready for a final vote.

Putting aside corporations for now, how would the GOP tax bill impact what taxpayers pay in **personal** income tax?

> **tl;dr** If your rich and married — you're in luck!

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

---

The charts above show how much **personal** income tax you would owe depending on your filing status and your income, assuming that you have no children or other dependents and that you take the standard deduction.

> Feel free to [adjust the chart](/taxman) to fit your tax situation, or [view the source code](https://github.com/divbzero/taxman) that generates each chart.

The difference in tax paid under the new tax bill would arise from:

* **Higher standard deduction.** Far fewer taxpayers would itemize their deductions: It would take a lot of itemized deductions to exceed the higher standard deduction.
* **Elimination of exemptions.** This would partly offset the higher standard deduction.
* **Lower tax rates.** A revamped set of tax brackets and marginal tax rates.

Three things jump out from the charts:

1. The final version of the tax bill follows the Senate version very closely.
2. The new tax bill gives particularly large tax cuts to married couples, whether they file jointly or separately.
3. Among married couples, the tax cuts grow larger for higher incomes.

In short, the tax bill particularly favors *rich married couples*.

---

*For more on the tax bill, NPR looks into [how specific provisions would affect you](https://www.npr.org/2017/12/15/571258698/chart-how-the-new-version-of-the-republican-tax-bill-would-affect-you), while the Tax Foundation provides a deeper analysis of the [long-term economic impact](https://taxfoundation.org/final-tax-cuts-and-jobs-act-details-analysis/).*

*Though we focused on personal income tax, the tax bill would also have significant impact on **corporate** income tax, including:*

* ***Shifting to a <u>territorial</u> tax system.** US corporations would no longer be taxed at the full corporate tax rate for income made outside of the country.*
* ***Lower tax rates.** The top marginal rate for US corporations would decrease from 35% to 21%.*

*The territorial tax system would have notable effects on how corporations do business. A clear example can be found in Above Avalon’s analysis of the [tax bill’s impact on Apple’s cash situation](https://www.aboveavalon.com/notes/2017/12/12/the-end-to-apples-cash-dilemma).*

