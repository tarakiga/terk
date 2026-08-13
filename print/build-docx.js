/**
 * Terk Energy: build the company profile as a Word document.
 *
 *   npm install docx
 *   node print/build-docx.js
 *
 * Writes print/Terk Energy Company Profile.docx.
 *
 * This is the same profile as the PDF, in a form the client can edit. It sets
 * Arial rather than the site's Archivo, because a document that is going to be
 * opened and edited on someone else's machine has to use a font that machine
 * already has; the colours, the gold rules and the structure carry the brand
 * instead. The photographs come from print/img, which are already cut and
 * graded by print/prepare-images.py.
 */

const fs = require('fs');
const path = require('path');
const {
  AlignmentType, BorderStyle, Document, Footer, HeadingLevel, ImageRun,
  LevelFormat, Packer, PageBreak, PageNumber, Paragraph, ShadingType, Table,
  TableCell, TableRow, TextRun, VerticalAlign, WidthType,
} = require('docx');

const ROOT = path.join(__dirname, '..');
const OUT = path.join(__dirname, 'Terk Energy Company Profile.docx');

const INK = '0B1119';
const INK_SOFT = '3D4A59';
const GOLD = 'B8842A';
const GOLD_DEEP = '8A6116';
const PLATE = '0C141E';
const RULE = 'DDDDD6';

const FONT = 'Arial';
const CONTENT_DXA = 9638;   // A4 less 2cm margins each side

/* --- Small builders ------------------------------------------------------ */

const body = (text, opts = {}) =>
  new Paragraph({
    spacing: { after: 160, line: 276 },
    ...opts,
    children: [new TextRun({ text, size: 21, color: INK_SOFT, font: FONT })],
  });

/** A run of bold lead-in followed by its sentence, the site's term and definition. */
const term = (label, text) =>
  new Paragraph({
    spacing: { after: 180, line: 276 },
    children: [
      new TextRun({ text: label + '. ', bold: true, size: 21, color: INK, font: FONT }),
      new TextRun({ text, size: 21, color: INK_SOFT, font: FONT }),
    ],
  });

const bullet = (text) =>
  new Paragraph({
    numbering: { reference: 'terk-bullets', level: 0 },
    spacing: { after: 100, line: 276 },
    children: [new TextRun({ text, size: 21, color: INK, font: FONT })],
  });

const label = (text) =>
  new Paragraph({
    spacing: { before: 240, after: 140 },
    children: [
      new TextRun({
        text: text.toUpperCase(),
        bold: true, size: 16, color: GOLD_DEEP, font: FONT, characterSpacing: 40,
      }),
    ],
  });

const picture = (file, ratio) => {
  const width = 620;
  return new Paragraph({
    spacing: { before: 160, after: 240 },
    children: [
      new ImageRun({
        type: 'jpg',
        data: fs.readFileSync(path.join(__dirname, 'img', file)),
        transformation: { width, height: Math.round(width / ratio) },
      }),
    ],
  });
};

/** Contact details, as a two column table with hairline rules. */
const contactTable = () => {
  const rows = [
    ['Email', 'info@terkenergy.com'],
    ['Telephone', '+234 817 014 1009'],
    ['Telephone', '+234 813 661 5889'],
    ['Web', 'www.terkenergy.com'],
  ];
  const cell = (children, width) =>
    new TableCell({
      width: { size: width, type: WidthType.DXA },
      margins: { top: 90, bottom: 90, left: 0, right: 120 },
      borders: {
        top: { style: BorderStyle.NONE, size: 0, color: 'FFFFFF' },
        left: { style: BorderStyle.NONE, size: 0, color: 'FFFFFF' },
        right: { style: BorderStyle.NONE, size: 0, color: 'FFFFFF' },
        bottom: { style: BorderStyle.SINGLE, size: 4, color: RULE },
      },
      verticalAlign: VerticalAlign.CENTER,
      children,
    });

  return new Table({
    columnWidths: [2400, 7238],
    width: { size: CONTENT_DXA, type: WidthType.DXA },
    rows: rows.map(([k, v]) =>
      new TableRow({
        children: [
          cell([new Paragraph({
            children: [new TextRun({
              text: k.toUpperCase(), bold: true, size: 15,
              color: GOLD_DEEP, font: FONT, characterSpacing: 40,
            })],
          })], 2400),
          cell([new Paragraph({
            children: [new TextRun({ text: v, size: 21, color: INK, font: FONT })],
          })], 7238),
        ],
      })),
  });
};

/* --- The document -------------------------------------------------------- */

const cover = [
  new Paragraph({
    spacing: { after: 200 },
    children: [
      new ImageRun({
        type: 'png',
        data: fs.readFileSync(path.join(ROOT, 'assets/img/terk-mark.png')),
        transformation: { width: 84, height: 114 },
      }),
    ],
  }),
  new Paragraph({
    spacing: { after: 1400 },
    children: [
      new TextRun({ text: 'TERK ', bold: true, size: 34, color: INK, font: FONT, characterSpacing: 80 }),
      new TextRun({ text: 'ENERGY', bold: true, size: 34, color: GOLD_DEEP, font: FONT, characterSpacing: 80 }),
    ],
  }),
  new Paragraph({
    spacing: { after: 200 },
    children: [new TextRun({ text: 'Company Profile', bold: true, size: 72, color: INK, font: FONT })],
  }),
  new Paragraph({
    spacing: { after: 260 },
    border: { bottom: { style: BorderStyle.SINGLE, size: 12, color: GOLD, space: 6 } },
    children: [],
  }),
  body(
    'An indigenous integrated energy services company working across the '
    + 'Nigerian oil and gas value chain, offshore and onshore.',
    { spacing: { after: 700 } },
  ),
  contactTable(),
  new Paragraph({ children: [new PageBreak()] }),
];

const heading = (text) =>
  new Paragraph({ text, heading: HeadingLevel.HEADING_1 });
const sub = (text) =>
  new Paragraph({ text, heading: HeadingLevel.HEADING_2 });

const content = [
  heading('An indigenous integrated energy company'),
  body('Terk Energy serves the Nigerian oil and gas value chain, offshore and onshore. Our offering covers engineering, procurement, construction, installation and commissioning; the operation, maintenance and upgrade of oil and gas facilities; alternative crude evacuation; maritime and logistics solutions; and asset development.'),
  body('Terk and its affiliates are committed to safety and to sustainability, and we continue to meet the demands of our clients efficiently: on schedule, to specification, and without shortcuts on either count.'),
  body('Our experience, our strategic partnerships and our understanding of the Nigerian oil and gas value chain, offshore and onshore, equip us with the technical expertise and the resources to deliver diverse projects when given the opportunity.'),

  sub('Vision'),
  body('To be a leading integrated energy service provider in Africa.'),
  sub('Mission'),
  body('Our mission is to create a reputable organization through hard work and diligence, whilst making a positive impact on our community and our environment.'),

  heading('Our core values'),
  body('Five commitments that decide how we take on work and how we behave once we have it.'),
  term('Teamwork', 'We win together, leveraging diverse strengths for collective success.'),
  term('Excellence', 'We hold ourselves to the highest standards in everything we do.'),
  term('Customer obsession', 'We put our clients at the centre, always seeking to exceed expectations.'),
  term('Ownership', 'We take responsibility, act with integrity, and deliver on our commitments.'),
  term('Innovation', 'We constantly improve, adapt, and pioneer better solutions.'),

  heading('How the company is organised'),
  body('Delivery, assurance and commercial functions are held in-house rather than assembled per project.'),
  ...[
    'EPC project management',
    'Engineering and construction leadership',
    'Procurement',
    'EHSSQ',
    'Vessel operations',
    'Shipping and chartering',
    'Gas and commercial analysis',
    'Finance, tax and project accounting',
    'Legal and corporate services',
    'Administration and human resources',
  ].map(bullet),

  new Paragraph({ children: [new PageBreak()] }),

  heading('Three service lines, one point of responsibility'),
  body('One point of responsibility across engineering and construction, marine and logistics, and advisory. Each line below lists what we actually take on, along with our technical partners.'),

  sub('EPCIC Services'),
  picture('welding.jpg', 174 / 84),
  body('Engineering, procurement, construction, installation and commissioning. We take fixed-scope responsibility on onshore and offshore facilities, from front-end design through to handover, and carry procurement and construction with it.'),
  label('Scope of work'),
  ...[
    'FEED and detailed engineering design',
    'Pipeline construction and maintenance',
    'Procurement of OCTG, wellheads and pumps',
    'Structural, civil and mechanical engineering and construction',
    'Heavy-duty equipment supply, installation and maintenance',
    'Upgrade of onshore and offshore production facilities',
    'Clean energy solutions',
  ].map(bullet),

  new Paragraph({ children: [new PageBreak()] }),

  sub('Marine & Logistics Services'),
  picture('tanker-alt.jpg', 174 / 84),
  body('We move crude and cargo. Our Alternative Crude Evacuation System runs end to end, covering regulatory and naval clearance, security, shuttle tanker, ship-to-ship transfer into the mother vessel, and hydrocarbon accounting, all under a single point of responsibility rather than a chain of separate vendors.'),
  label('Scope of work'),
  ...[
    'Alternative Crude Evacuation System (ACES)',
    'Marine vessel supply and operations',
    'Offshore construction and installation',
    'Offshore operations support services',
    'Land and marine logistics support',
    'Hydrocarbon accounting',
  ].map(bullet),

  new Paragraph({ children: [new PageBreak()] }),

  sub('Advisory & Consultancy Services'),
  picture('advisory.jpg', 174 / 84),
  body('Technical and commercial judgement for assets and transactions. We advise on asset development, run due diligence across the technical, commercial and regulatory dimensions, and structure gas commercialization.'),
  label('Scope of work'),
  ...[
    'Asset development advisory and consulting',
    'Technical, commercial and regulatory due diligence',
    'Tailored end-to-end alternative crude evacuation solutions',
    'Gas commercialization',
  ].map(bullet),

  new Paragraph({ children: [new PageBreak()] }),

  heading('What our engagements involve'),
  body('These describe the shape of the work we are set up to take. They are capability, not a claim about any particular contract.'),
  term('Tubular procurement package', "Procurement of casing or tubing to a stated grade, weight and range for a drilling programme. Our scope runs across manufacture with the OEM partner, factory acceptance testing, shipping, in-country clearing, and logistics through to delivery at the client's facility, with project execution and the delivery schedule on our side of the line."),
  term('Alternative crude evacuation campaign', 'Evacuating crude from a field without pipeline access, using a shuttle tanker and a ship-to-ship transfer into a mother vessel. End to end this covers port and naval clearance, security cover, the marine spread, the transfer itself, hydrocarbon accounting and advisory through to reconciliation.'),
  term('Land and marine logistics support', 'Sustained logistics for a producing asset or a construction campaign: crew and supply vessel provision, marine coordination, and the land-side movement that has to meet it. Measured on availability and turnaround rather than on mobilisation.'),

  heading('How the work is carried'),
  term('Scope', 'We take defined scope with a defined interface. Where we are a sub-contractor, we say so; where we hold the whole package, we hold the schedule, the procurement and the site with it.'),
  term('Partners', 'Original equipment manufacturers and technical partners are named into the scope from the outset rather than found once the contract is signed.'),
  term('Assurance', 'Factory acceptance testing, inspection and quality hold points are planned into the programme, not bolted on at the end.'),

  new Paragraph({ children: [new PageBreak()] }),

  heading('Our HSSE commitment'),
  body('Terk Energy demonstrates leadership and commitment to HSE by the proper allocation of time and resources to HSES matters, and by giving HSES equal priority with work completion and milestone achievement. Our leadership commits as follows.'),
  ...[
    'Provide a safe work environment, and high quality, safe equipment for the work.',
    'Make financial resources available for the purchase of personal protective equipment.',
    'Employ qualified staff, and train staff in HSES.',
    'Take part in HSES policy formulation, and in HSES review meetings, audits and inspections.',
    'Promote an HSES culture throughout company communications.',
  ].map(bullet),
  picture('hsse.jpg', 174 / 104),

  new Paragraph({ children: [new PageBreak()] }),

  heading('Our quality commitment'),
  body('Our primary goal is to achieve the highest standards of quality in all our business practices and operations, without compromise. We are committed to ensuring that our work processes and business activities meet standards and exceed expectations for the quality and satisfaction of all interested parties. To this end, we shall:'),
  ...[
    'Sustain a process approach, where regular monitoring of system performance, factual analysis and market feedback are the basis for effective decision-making and continual improvement.',
    'Foster mutually beneficial relationships with business partners.',
    'Evaluate quality risks, managed as an integral part of the system, to ensure services and output are fit for purpose.',
    'Identify and comply with applicable legal and regulatory requirements.',
    'Ensure that adequate resources are provided for the implementation and maintenance of our quality management system.',
  ].map(bullet),
  body('If you are running a pre-qualification and need our HSE plan, quality manual or policy statements, ask and we will send them.', { spacing: { before: 240, after: 160 } }),

  new Paragraph({ children: [new PageBreak()] }),

  heading('Tell us about your project'),
  body('Send us your tender document, scope of work, or the problem you need solved. We will review it and respond with a clear answer on how we can support you, and tell you who will be handling it.', { spacing: { after: 400 } }),
  contactTable(),
];

const doc = new Document({
  creator: 'Terk Energy',
  title: 'Terk Energy Company Profile',
  description: 'Company profile and capability statement',
  styles: {
    default: {
      document: {
        run: { font: FONT, size: 21, color: INK_SOFT },
        paragraph: { spacing: { after: 160, line: 276 } },
      },
      heading1: {
        run: { font: FONT, size: 32, bold: true, color: INK },
        paragraph: {
          spacing: { before: 460, after: 240 },
          border: { bottom: { style: BorderStyle.SINGLE, size: 10, color: GOLD, space: 8 } },
        },
      },
      heading2: {
        run: { font: FONT, size: 25, bold: true, color: PLATE },
        paragraph: { spacing: { before: 340, after: 160 } },
      },
    },
  },
  numbering: {
    config: [{
      reference: 'terk-bullets',
      levels: [{
        level: 0,
        format: LevelFormat.BULLET,
        text: '•',
        alignment: AlignmentType.LEFT,
        style: {
          run: { color: GOLD, font: FONT },
          paragraph: { indent: { left: 340, hanging: 240 } },
        },
      }],
    }],
  },
  sections: [{
    properties: {
      titlePage: true,
      page: { margin: { top: 1418, bottom: 1418, left: 1134, right: 1134 } },
    },
    footers: {
      first: new Footer({ children: [new Paragraph({ children: [] })] }),
      default: new Footer({
        children: [new Paragraph({
          alignment: AlignmentType.RIGHT,
          border: { top: { style: BorderStyle.SINGLE, size: 4, color: RULE, space: 8 } },
          children: [
            new TextRun({
              children: ['Terk Energy    ', PageNumber.CURRENT],
              size: 16, color: GOLD_DEEP, font: FONT, characterSpacing: 30,
            }),
          ],
        })],
      }),
    },
    children: [...cover, ...content],
  }],
});

Packer.toBuffer(doc).then((buffer) => {
  fs.writeFileSync(OUT, buffer);
  console.log(`Wrote ${OUT}  (${(buffer.length / 1024).toFixed(0)} KB)`);
});
