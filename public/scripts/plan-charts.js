$(function () {

var params = {
    risk: 0.5,
    amount: 500
};
var allCategories = [
    'U.S. Stocks',
    'Foreign Stocks',
    'Emerging Markets',
    'Dividend Stocks',
    'Real Estate',
    'TIPS',
    'Corporate Bonds',
    'Emerging Market Bonds'
];
var allNames = [
    'Vanguard VTI',
    'Vanguard VEA',
    'Vanguard VWO',
    'Vanguard VIG',
    'Vanguard VNQ',
    'Schwab SCHP',
    'iShares LQD',
    'iShares EMB'
];
var allColors = ['#d76f32', '#e1ab3a', '#bdd15f', '#70bb83', '#70ccc1', '#66bacc', '#149ecc', '#5c8ce5'];
var stocksOrder = ["US_STOCKS", "INTL_DEVELOPED", "INTL_EMERGING", "DIV_STOCKS", "REAL_ESTATE", "INFL_BONDS", "CORP_BONDS", "EM_BONDS"];
var riskToPct = [
    {n: 0.5, data: [6,  5,  5,  5,  5,  25, 35, 14]},
    {n: 1.0, data: [8,  5,  5,  11, 5,  19, 35, 12]},
    {n: 1.5, data: [12, 5,  5,  12, 5,  14, 35, 12]},
    {n: 2.0, data: [15, 6,  5,  12, 5,  9,  35, 13]},
    {n: 2.5, data: [16, 8,  5,  13, 5,  5,  35, 13]},
    {n: 3.0, data: [17, 10, 6,  14, 5,  0,  35, 13]},
    {n: 3.5, data: [17, 11, 7,  15, 5,  0,  35, 10]},
    {n: 4.0, data: [18, 12, 8,  15, 6,  0,  31, 10]},
    {n: 4.5, data: [18, 13, 9,  15, 8,  0,  28, 9 ]},
    {n: 5.0, data: [18, 14, 10, 15, 9,  0,  25, 9 ]},
    {n: 5.5, data: [19, 15, 11, 15, 10, 0,  21, 9 ]},
    {n: 6.0, data: [19, 16, 12, 15, 11, 0,  19, 8 ]},
    {n: 6.5, data: [20, 17, 13, 15, 12, 0,  15, 8 ]},
    {n: 7.0, data: [20, 17, 14, 15, 13, 0,  13, 8 ]},
    {n: 7.5, data: [21, 18, 15, 15, 14, 0,  10, 7 ]},
    {n: 8.0, data: [22, 19, 16, 15, 15, 0,  6,  7 ]},
    {n: 8.5, data: [23, 19, 17, 15, 15, 0,  5,  6 ]},
    {n: 9.0, data: [21, 18, 22, 13, 16, 0,  5,  5 ]},
    {n: 9.5, data: [21, 18, 27, 8,  16, 0,  5,  5 ]},
    {n: 10,  data: [20, 18, 31, 5,  16, 0,  5,  5 ]}
];
var stocks = {
    "US_STOCKS":     [1.0553,1.0010,0.9547,1.0492,1.0683,1.0415,1.0784,0.9594,1.0567,0.9664,1.0382,1.02,1.0051,1.0715,1.0495,1.0098,0.9753,1.0338,0.9818,0.8468,1.0682,1.0759,1.0611,1.0635,1.0339,0.9645,1.0367,1.0451,0.9809,1.0505,0.9696,0.9886,0.9744,1.0627,1.0279,1.0638,0.9608,1.0092,1.0783,0.9647,0.9719,1.0296,0.9823,1.0741,0.9547,0.9857,0.9078,1.0168,1.0342,0.9086,0.9348,1.0802,1.008,0.9868,0.9809,0.9414,0.9131,1.0205,1.0762,1.0144,0.9913,0.9825,1.0368,0.9554,0.9859,0.9311,0.9166,1.0076,0.899,1.0749,1.06,0.9493,0.9723,0.9846,1.0076,1.0861,1.0583,1.0162,1.0233,1.0239,0.9895,1.0605,1.015,1.04,1.0261,1.014,0.9897,0.9778,1.0145,1.0203,0.9644,1.0006,1.0168,1.018,1.0474,1.0343,0.975,1.0209,0.9813,0.978,1.0388,1.0076,1.0438,0.9891,1.0079,0.9765,1.0462,1.0002,1.0322,1.0022,1.0205,1.0096,0.9678,1.0013,0.9988,1.023,1.0228,1.0361,1.0223,1.012,1.0186,0.9838,1.0112,1.0402,1.0373,0.9824,0.9647,1.0147,1.0385,1.0179,0.9548,0.993,0.9383,0.975,0.991,1.0489,1.0202,0.9188,0.9938,1.0146,0.9076,0.8252,0.9199,1.0178,0.9195,0.8947,1.0826,1.1099,1.0546,1.0036,1.0774,1.0371,1.0414,0.9737,1.0569,1.0286,0.9643,1.0344,1.064,1.0218,0.9212,0.9417,1.0702,0.9529,1.0945,1.0403,1.0051,1.0696,1.0205,1.037,1.0042,1.029,0.9894,0.9821,0.9773,0.9391,0.9243,1.1137,0.9963,1.0098,1.0507,1.0422,1.0306,0.9936,0.9377,1.0405,1.0088,1.027,1.0249,0.9819,1.0077,1.0129,1.0542,1.0128,1.0395,1.0161,1.0244,0.9857,1.0575,0.9697,1.039,1.0426,1.0271,1.0273,0.9683,1.0487,1.0051,1.0006,1.021,1.0262,0.9801,1.0415,0.979,1.0275,1.0248,0.9996,0.9726,1.0574,0.9884,1.0062],
    "INTL_DEVELOPED":[0.9590,1.0171,1.0016,1.0082,1.0728,1.0543,1.0156,0.93,1.0539,0.9265,0.9875,1.0045,1.049,1.061,1.0285,1.0051,0.9994,1.0032,1.0058,0.878,0.9716,1.106,1.0539,1.0353,0.9952,0.9776,1.0466,1.0453,0.9482,1.0418,1.035,1.0126,1.0108,1.0374,1.0395,1.0841,0.9338,1.0123,1.0437,0.9515,0.9711,1.041,0.9607,1.0174,0.9536,0.9753,0.9672,1.032,1.001,0.9285,0.9291,1.0729,0.9676,0.9594,0.9763,0.9759,0.8986,1.0297,1.0332,1.0081,0.948,1.0053,1.0593,1.003,1.0176,0.9611,0.9021,0.9984,0.8889,1.0573,1.0479,0.966,0.9589,0.9772,0.9801,1.1012,1.0631,1.0245,1.0254,1.0229,1.0301,1.0632,1.0217,1.077,1.0151,1.0228,1.005,0.9769,1.0033,1.0225,0.9687,1.005,1.027,1.0338,1.0696,1.0436,0.9814,1.0429,0.9757,0.9786,1.0018,1.014,1.0318,1.0247,1.042,0.9719,1.0238,1.0452,1.0619,0.9992,1.0341,1.0486,0.963,1.0014,1.0116,1.0278,1.0019,1.0396,1.0297,1.0308,1.0068,1.0073,1.0256,1.0469,1.0204,1.0031,0.986,0.9992,1.0476,1.0443,0.9624,0.9719,0.9261,0.9899,1.0038,1.0538,1.0121,0.9132,0.9653,0.9599,0.8841,0.7944,0.9338,1.0897,0.8598,0.8992,1.0842,1.1182,1.1306,0.9818,1.1057,1.045,1.0394,0.9723,1.0411,1.0079,0.9456,1.0074,1.063,0.9723,0.8847,0.9819,1.1166,0.9642,1.0966,1.0406,0.951,1.0844,1.0216,1.0366,0.975,1.0619,0.973,0.9878,0.9761,0.9142,0.8867,1.0976,0.9791,0.9788,1.0562,1.0488,1.0033,0.9762,0.8883,1.0698,1.0025,1.0329,1.0264,1.0106,1.0271,1.0424,1.0383,0.9885,1.0119,1.0522,0.9703,0.9723,1.052,0.984,1.0785,1.0321,1.0066,1.019,0.9479,1.0595,0.9963,1.0158,1.0177,1.0104,0.9763,1.0026,0.9584,0.9965,1.0,0.9623,1.0071,1.0616,0.9878,1.0387],
    "INTL_EMERGING": [1.0580,1.0575,0.9692,0.9774,1.0247,1.0415,1.0075,0.8599,1.017,0.8222,0.9572,1.0132,0.9387,1.1027,1.0432,0.9956,0.8634,0.8795,1.0418,0.6954,1.0911,1.1174,1.0918,0.9804,0.9862,1.0032,1.1082,1.1489,0.9966,1.11,0.9795,1.0123,0.9717,1.0378,1.0764,1.1252,0.9859,1.0057,1.001,0.891,0.9828,1.0186,0.9489,1.0037,0.9174,0.9067,0.925,1.0391,1.1403,0.9331,0.9137,1.0504,1.0294,0.9781,0.9356,0.9995,0.8422,1.0613,1.1013,1.0815,1.0364,1.0202,1.062,1.0174,0.9806,0.9206,0.929,1.0112,0.8871,1.0689,1.0585,0.9647,1.0046,0.9621,0.9717,1.0807,1.0711,1.0631,1.0635,1.0687,1.0077,1.0788,1.0056,1.0708,1.038,1.0511,1.0158,0.9266,0.9869,0.9896,0.9774,1.0473,1.0534,1.0272,1.0899,1.0548,0.9979,1.0858,0.9335,0.9767,1.0291,1.0346,1.0697,1.0143,1.0823,0.9434,1.0697,1.0654,1.1163,0.9785,1.0117,1.078,0.8871,0.9991,1.0185,1.0148,1.0108,1.0505,1.0733,1.0401,1.0008,0.9756,1.0438,1.038,1.0666,1.0455,1.0352,0.9999,1.0983,1.1301,0.9147,0.9902,0.9098,1.0288,0.9632,1.0843,1.0179,0.9019,0.9528,0.9208,0.8441,0.7273,0.9135,1.0759,0.9109,0.9762,1.124,1.1744,1.1789,0.9755,1.1091,0.9929,1.0996,0.9759,1.0718,1.031,0.9327,1.0189,1.0818,0.9979,0.9082,0.9945,1.1021,0.9744,1.1142,1.031,0.9716,1.0755,0.9656,0.9983,1.0547,1.0337,0.9706,0.99,0.9938,0.9091,0.8156,1.1591,0.9829,0.9583,1.1078,1.0543,0.974,0.979,0.8934,1.0502,1.002,1.0024,1.0532,0.9946,1.0125,1.0707,1.0007,0.9763,0.9873,1.0202,0.9492,0.9469,1.0068,0.9657,1.0728,1.0431,0.9908,0.9972,0.9157,1.0324,1.0462,1.0089,1.031,1.0317,1.0137,1.0384,0.9282,1.0223,0.989,0.9531,0.998,1.0466,0.9795,1.0741],
    "DIV_STOCKS":    [1.0328,1.0395,0.9555,1.0352,1.0541,1.0380,1.0849,0.9784,1.0647,0.9748,1.0376,1.0367,0.9779,1.0745,1.0553,1.0062,0.9784,0.9984,0.9722,0.8475,1.0439,1.0444,1.052,1.0119,0.9595,0.9837,1.0153,1.1176,0.9981,1.0232,0.9677,0.9454,0.9608,1.0433,0.969,0.9859,0.9637,0.9062,1.0962,1.0155,1.0378,1.0005,0.998,1.0066,1.0386,1.0338,0.9927,1.0363,0.9576,0.9803,0.9519,1.0311,1.0246,0.9726,1.0268,0.9612,0.9812,0.9922,1.0489,1.0131,0.9933,1.0163,1.0178,0.9551,0.9961,0.9487,0.9425,1.0029,0.9116,1.0737,1.0209,0.9572,0.9624,0.9816,1.0262,1.0714,1.0304,1.0077,1.0123,1.0034,0.9934,1.0518,1.0029,1.0427,1.0097,1.0259,0.9916,0.9994,1.0078,1.0094,0.9709,1.0202,0.9959,1.006,1.0256,1.0341,0.984,1.0185,0.9839,0.981,1.0285,0.9963,1.0321,0.9807,1.0023,0.9935,1.0282,1.0001,1.0162,1.0109,1.0061,1.0091,0.9866,0.9982,1.0022,1.0227,1.0226,1.0271,1.0083,1.016,1.0156,0.9826,1.0028,1.0444,1.0248,0.984,0.9748,1.023,1.0343,0.9967,0.9797,0.9951,0.9473,0.9845,1.0203,1.0256,1.0033,0.9214,1.0106,1.0208,0.9328,0.859,0.9745,1.0088,0.9238,0.8948,1.0703,1.0729,1.0495,1.0049,1.0656,1.0241,1.0315,0.9957,1.0579,1.0073,0.977,1.0242,1.0462,1.0217,0.9276,0.9566,1.0638,0.9656,1.0831,1.0283,1.003,1.0534,1.0142,1.0341,1.0106,1.0349,0.9873,0.9923,0.9654,0.968,0.9374,1.096,1.0187,1.01,1.026,1.0276,1.0209,0.9966,0.9563,1.0218,1.0196,1.019,1.0187,0.9874,1.0144,1.0047,1.0593,1.0116,1.0338,1.0167,1.0115,0.9849,1.0541,0.9643,1.0397,1.0417,1.0232,1.0196,0.9499,1.049,1.0079,1.0101,1.0161,1.0149,0.9669,1.0365,0.99,1.0265,1.0322,1.0011,0.9662,1.0559,0.9773,0.9979],
    "REAL_ESTATE":   [1.0012,0.9961,1.0047,0.9674,1.0300,1.0528,1.0271,0.9932,1.0944,0.9729,1.0147,1.0226,0.9856,0.9838,1.0236,0.9645,0.9912,0.9998,0.9298,0.9057,1.0619,0.981,1.0157,0.9821,0.9731,0.9835,0.9945,1.0966,1.0211,0.9813,0.9685,0.9903,0.9581,0.9771,0.9851,1.031,1.0062,0.984,1.0366,1.0671,1.0092,1.0247,1.0906,0.9589,1.0307,0.9525,1.0175,1.071,1.0042,0.9827,1.0081,1.0231,1.0223,1.0603,0.9783,1.0369,0.96,0.9664,1.0582,1.0259,0.9976,1.0197,1.0643,1.0063,1.0126,1.0286,0.9438,1.0016,0.9636,0.9497,1.046,1.0082,0.9724,1.0178,1.0209,1.0421,1.0564,1.0231,1.053,1.006,1.0352,1.0168,1.0439,1.0313,1.0437,1.0166,1.0557,0.8517,1.0717,1.0283,1.0052,1.0803,0.9979,1.0567,1.0395,1.0474,0.9144,1.0317,0.9829,1.0577,1.0352,1.046,1.0714,0.9595,1.0133,0.9712,1.0416,1.0004,1.0754,1.0186,1.0473,0.966,0.973,1.0495,1.0389,1.0348,1.0181,1.0619,1.0478,0.9817,1.0878,0.9718,0.9805,0.9987,0.9962,0.9101,0.9174,1.0674,1.039,1.021,0.9053,0.9459,0.9922,0.9682,1.0648,1.0638,0.9979,0.8938,1.0312,1.0237,0.9989,0.6827,0.7728,1.1667,0.8247,0.7947,1.0361,1.3068,1.0262,0.9677,1.1077,1.1432,1.0663,0.9554,1.0657,1.0737,0.9448,1.0558,1.1018,1.0715,0.9467,0.9481,1.0959,0.9872,1.0445,1.0474,0.9815,1.0454,1.0325,1.0471,0.9838,1.0575,1.0137,0.967,1.0156,0.9438,0.8915,1.1429,0.962,1.0485,1.0638,0.9885,1.0519,1.0286,0.9549,1.0552,1.02,0.9999,0.9814,0.9909,0.9974,1.0372,1.0374,1.0122,1.0287,1.0673,0.9402,0.9802,1.009,0.9302,1.0349,1.0452,0.9475,1.001,1.0428,1.0507,1.0049,1.0329,1.024,1.0113,1.0008,1.0304,0.9396,1.0994,1.02,1.0188,1.0685,0.9633,1.0174,0.9415],
    "COMMODITIES":   [1.0398,0.9110,1.0115,1.0030,1.0859,1.0222,1.0702,1.0195,1.0638,0.9825,0.9385,1.0048,0.9394,1.0647,1.0474,1.0106,0.9566,0.9761,0.9011,0.8201,1.1607,1.0194,0.9419,0.9745,0.9344,0.9914,1.1414,1.148,0.9784,1.0204,1.0189,1.0109,0.954,0.9852,0.9983,1.007,1.0081,0.9577,1.1246,0.9851,1.1174,0.9449,0.9619,1.1092,1.0163,0.9728,0.9475,1.1021,0.9681,0.9879,0.9702,1.1033,0.9906,0.9088,0.9885,0.9577,0.9038,1.0403,0.9442,1.0571,0.9644,1.0342,1.0885,0.964,0.9824,0.9634,0.8614,1.0151,0.9286,1.0184,1.0413,1.0001,0.9749,1.0294,1.0013,0.9915,1.1062,0.9872,0.9647,1.0638,0.9793,1.0096,1.0078,1.1309,1.0225,1.0525,0.9938,1.017,0.997,1.0623,1.0308,0.9846,1.0976,1.006,1.0674,0.9718,1.0339,1.1678,0.9809,0.9459,1.0279,1.0697,1.0709,1.0639,1.0628,0.9096,1.015,1.0181,1.1461,0.9077,1.0425,1.0504,0.9722,1.0254,1.0335,0.9492,0.9634,1.0427,1.0858,0.9718,0.9908,0.9795,1.0629,1.0513,1.0778,1.013,1.0001,1.012,1.074,1.0254,0.9579,1.0827,0.8771,1.0927,0.9766,1.1038,1.052,1.0316,0.8409,1.0034,0.8505,0.812,0.9782,0.955,0.9822,0.8767,1.0378,1.0782,1.1289,0.9346,1.0535,1.0109,1.0584,1.0247,1.0284,1.0088,0.956,1.0301,1.0282,1.0416,0.8855,0.9407,1.0837,0.951,1.1,1.0567,1.0586,1.0932,1.0718,1.0737,1.0188,1.0091,0.9581,0.9808,1.0146,0.8978,0.8558,1.1914,1.0166,0.9795,1.0226,1.0593,0.9618,0.9929,0.8932,1.048,1.0494,1.027,1.0312,0.9796,0.9878,1.0102,1.083,1.0044,1.0254,0.9869,1.0285,0.9773,1.0526,0.9897,1.0212,1.042,1.0006,1.0287,0.942,1.0512,1.0211,1.0525,1.0167,1.0551,0.9653,1.0218,0.9225,0.9647,0.9131,0.9977,0.9544,1.0459,0.9884,1.0657],
    "BONDS":         [1.0022,1.0016,0.9851,1.0161,1.0103,1.0117,1.0320,0.9874,1.0165,1.0155,1.0028,1.0094,1.0163,0.9976,1.0026,1.0051,1.0098,1.008,1.002,1.0192,1.0387,0.9911,1.0014,1.0052,1.0064,0.9733,1.0073,1.0025,0.9851,0.9966,0.9953,0.9978,1.012,1.0023,1.0003,0.9916,0.993,1.0095,1.0165,0.9929,0.9987,1.025,1.0086,1.0161,1.0087,1.005,1.0186,1.0252,1.0186,1.0116,1.0066,0.9906,1.005,1.0036,1.0288,1.0134,1.0114,1.0241,0.9829,0.9884,1.0079,1.0113,0.9756,1.0209,1.0136,1.0086,1.0115,1.026,1.0267,0.9891,0.9999,1.0326,0.9988,1.0228,0.9995,1.0127,1.0355,0.9961,0.9495,1.0057,1.0401,0.9856,1.0035,1.0107,1.0111,1.0144,1.0117,0.9631,0.9917,1.006,1.0134,1.0264,1.0049,1.0105,0.9868,1.0124,1.006,0.9912,0.9895,1.0181,1.0149,1.0067,0.9859,1.0172,0.9849,0.9886,1.0056,1.0096,0.9972,1.0011,0.9877,0.996,0.9985,1.0012,1.015,1.0189,1.0108,1.0066,1.0134,0.9907,0.9981,1.02,0.9984,1.006,0.9921,0.9969,1.0092,1.0148,1.006,1.0092,1.0196,1.0084,1.0125,1.0009,1.004,0.9966,0.9901,1.0004,1.0002,1.0084,0.9948,0.9705,1.0393,1.0514,0.9792,0.9941,1.0109,1.0046,1.0067,1.0062,1.0131,1.0101,1.01,1.0027,1.013,0.9855,1.0129,1.0033,0.9978,1.0107,1.0113,1.0145,1.0086,1.0156,1.0,1.0032,0.9932,0.9898,1.0009,1.0029,0.9985,1.0146,1.0118,0.9962,1.0163,1.0166,1.0066,1.0011,0.9994,1.0118,1.0063,1.0004,0.9949,1.011,1.0093,1.0007,1.0123,1.0016,1.0018,0.999,1.0027,0.9982,0.9931,1.0054,1.0008,1.0102,0.9807,0.9835,1.0038,0.9914,1.0111,1.0086,0.9971,0.9937,1.0155,1.0047,0.9983,1.008,1.0105,1.0008,0.9972,1.0114,0.9943,1.0072,1.0083,1.0006,1.024,0.9869,1.0055,0.9968],
    "INFL_BONDS":    [1.0022,1.0016,0.9851,1.0070,1.0055,0.9966,1.0096,1.0031,1.0019,1.0106,1.0055,0.9955,1.0045,0.9993,0.9992,1.0036,1.0062,1.0028,1.0049,1.0023,1.0202,1.0021,0.9988,0.9951,1.0104,0.993,1.0007,1.0058,1.0067,1.0003,1.0,1.0017,1.0039,1.0016,1.0064,0.9913,1.0054,1.0088,1.0305,1.0122,0.9973,1.0125,1.0084,1.0071,1.0054,1.0119,1.0147,1.01,1.0211,1.0178,1.0087,1.0065,1.0117,0.9986,1.0165,1.0013,1.0064,1.0229,0.9761,0.9897,1.005,1.0157,0.9938,1.0276,1.0168,1.0137,1.0169,1.0375,1.0242,0.9731,0.9994,1.0352,1.0065,1.0374,0.9828,0.9978,1.0479,0.9901,0.952,1.0193,1.0335,1.005,1.0004,1.0092,1.0132,1.023,1.0157,0.952,1.0172,1.0004,1.0096,1.0264,1.0022,1.0098,0.9968,1.0184,0.9994,0.9956,1.0014,1.0191,1.0071,1.0036,0.9795,1.0227,0.9984,0.9872,1.002,1.011,1.001,0.9995,0.9784,0.9981,1.0033,1.0028,1.0157,1.0177,1.0019,0.9982,1.0122,0.9764,1.0011,1.0209,1.0021,1.0071,0.9876,0.9983,1.0228,1.0091,1.0126,1.0115,1.04,0.9992,1.037,1.0134,1.0001,0.9787,1.0017,1.0166,0.9932,1.01,0.9605,0.9172,1.0123,1.0482,1.0082,0.9806,1.0588,0.9806,1.0207,1.005,1.0012,1.0081,1.0211,1.0121,1.0279,0.978,1.0159,0.9881,1.0014,1.0244,0.9995,1.0144,1.0013,1.0177,1.01,1.0217,0.9828,0.9847,1.0,1.0078,1.0103,1.0249,1.0034,1.0073,1.0386,1.0089,0.9996,1.0184,1.0056,1.0025,1.0214,0.9952,0.9896,1.0198,1.018,0.9941,1.0184,0.9959,1.0062,1.0069,1.0053,0.9931,0.9925,1.0011,1.0019,1.0091,0.958,0.9616,1.0081,0.9818,1.0175,1.0052,0.9895,0.9829,1.0235,1.0041,0.9948,1.0136,1.0193,1.004,0.9994,1.0065,0.9739,1.0093,1.0018,0.991,1.031,0.9868,0.9953,1.0067],
    "MUNI_BONDS":    [1.0018,1.0068,0.9905,1.0045,1.0084,1.0130,1.0193,0.9934,1.0092,1.0024,1.0039,1.0132,1.0079,1.0005,1.0002,0.994,1.0155,1.0023,1.0027,1.0138,1.009,1.0008,1.0022,1.005,1.0123,0.9957,1.0007,1.003,0.9947,0.9864,1.0029,0.991,0.998,0.9891,1.0089,0.9932,0.9946,1.0141,1.0205,0.9941,0.9954,1.0246,1.014,1.0144,0.9951,1.0102,1.0073,1.0241,1.0075,1.0044,1.0081,0.9882,1.0112,1.0075,1.0147,1.0163,0.9949,1.0103,0.9918,0.9929,1.014,1.0116,0.9816,1.0181,1.0065,1.0086,1.0124,1.011,1.0208,0.9824,0.9967,1.0222,0.9946,1.0152,0.9992,1.0091,1.0227,0.9949,0.9646,1.0091,1.0291,0.9973,1.0118,1.008,1.0048,1.0165,0.9955,0.9764,0.9965,1.0047,1.0128,1.0194,1.0057,1.0081,0.9924,1.0138,1.0098,0.9971,0.994,1.0152,1.009,1.0067,0.9958,1.0103,0.9927,0.994,1.0041,1.0099,1.0024,1.0075,0.9941,0.9989,1.0053,0.9964,1.0121,1.0145,1.0068,1.0063,1.0085,0.9966,0.9986,1.0116,0.9981,1.0036,0.9956,0.9948,1.0064,0.9938,1.0137,1.0031,1.0138,1.0071,1.0026,0.9536,1.0313,1.0155,1.0059,0.9827,1.0056,1.0145,0.9662,0.9903,0.9946,1.0528,0.9999,1.0051,1.0029,1.0232,1.0007,0.9855,1.0178,1.0189,1.033,0.9739,1.0052,1.0038,1.0038,1.0084,0.9994,1.0115,1.0083,0.9966,1.0141,1.0216,0.9997,0.9919,0.9721,0.9749,0.9982,1.023,0.988,1.0277,1.0233,0.9987,1.0055,1.0339,0.9996,0.9947,1.0064,1.025,1.0353,0.9893,0.9918,1.0087,1.012,0.9928,1.0207,0.9985,1.0057,1.0047,1.0185,0.9742,1.0081,1.0053,0.9869,1.0175,0.9695,0.9731,0.992,0.9828,1.028,1.0121,0.9953,0.9959,1.0256,1.0105,1.0008,1.0124,1.0112,0.9984,1.0045,1.0126,0.9992,1.0055,1.0012,1.0081,1.016,0.9888,1.0022,0.9929],
    "CORP_BONDS":    [0.9967,1.0065,0.9763,1.0182,1.0133,1.0195,1.0539,0.9752,1.0234,1.0184,1.0112,1.0155,1.0095,0.9989,1.0039,1.0071,1.0171,1.0104,0.9933,1.0007,1.0362,0.9728,1.0365,1.0005,1.0139,0.967,1.0052,0.9963,0.9808,0.9921,0.9966,0.9987,1.0111,1.002,0.9979,0.994,0.9917,1.0065,1.0168,0.9927,0.991,1.0268,1.0102,1.0129,1.0124,0.9992,1.0097,1.0215,1.0313,1.003,1.0069,0.9967,1.0097,1.0014,1.0324,1.0116,1.004,1.0263,0.9911,0.9926,1.0069,1.006,0.9693,1.0129,1.0091,0.983,0.9968,1.0364,1.0209,0.9939,1.0072,1.0393,0.9919,1.0198,1.0012,1.0212,1.0359,0.9961,0.94,1.0121,1.0427,0.9849,1.0031,1.0128,1.0122,1.0151,1.0099,0.9611,0.9948,1.0013,1.0156,1.0308,1.0031,1.0118,0.9878,1.0139,1.0123,0.9906,0.9874,1.0162,1.0062,1.0122,0.9918,1.015,0.9814,0.9842,1.0066,1.0086,0.9956,1.0068,0.9832,0.998,0.9981,0.9991,1.0146,1.0222,1.0087,1.0105,1.0141,0.9911,1.0009,1.0198,0.9934,1.0089,0.9877,0.9919,0.9918,1.0238,1.0073,1.0097,1.0102,0.9919,1.0257,0.9929,0.994,1.0125,0.9779,0.9871,1.0039,1.0015,0.8927,0.9805,1.0335,1.138,0.982,0.948,1.0047,1.0278,1.0232,1.0289,1.0463,1.0131,1.0176,0.9951,1.0195,0.9793,1.0125,1.0051,1.0065,1.0191,0.9869,1.0328,1.0211,1.0286,1.0046,0.9974,0.9838,0.9925,1.0004,1.0108,0.9946,1.025,1.0127,0.992,1.0243,1.0034,1.0035,1.0251,0.9684,1.0349,1.0214,1.0163,0.9858,1.0108,1.0076,1.0087,1.0348,0.9995,1.011,1.0135,0.9958,0.9967,0.987,1.0108,0.9995,1.0217,0.9678,0.9673,1.0111,0.99,1.0074,1.0181,0.9986,1.0021,1.0188,1.0114,0.9997,1.0133,1.0151,1.0001,0.9968,1.02,0.9832,1.0123,1.0091,0.9998,1.0375,0.9858,1.002,0.9881],
    "EM_BONDS":      [1.0301,1.0159,0.9663,1.0290,1.0336,1.0216,1.0410,0.9949,1.0274,0.8938,1.042,1.0241,1.0002,1.027,1.0233,1.002,0.9689,0.973,1.0009,0.7108,1.1113,1.0657,1.064,0.9851,0.9758,1.0057,1.0634,1.0643,0.9415,1.0356,0.9798,0.995,1.0325,1.0369,1.0265,1.0421,0.9826,1.0533,1.0224,0.9776,0.9741,1.0493,1.0314,1.0342,0.9867,0.9785,0.9941,1.0444,1.0487,0.987,0.993,0.9963,1.0273,1.0199,0.9624,1.041,0.9708,1.0139,1.0051,1.0158,1.0194,1.0381,1.0011,1.0141,0.9949,0.9537,0.96,1.0654,0.9793,1.0526,1.0303,1.025,1.0152,1.0295,1.0091,1.0596,1.0445,1.0002,0.9649,1.0231,1.0389,1.0059,1.0107,1.0307,1.0053,1.005,1.0262,0.9432,0.9836,1.0141,1.0315,1.0406,1.0161,1.0163,1.0062,1.0235,1.0067,1.0069,0.9743,1.0115,1.0279,1.0189,0.9982,1.0192,1.0193,0.9851,1.0141,1.018,1.0118,1.0221,0.9823,0.9995,0.9785,0.9969,1.0338,1.0257,1.0048,1.0201,1.0126,1.0075,0.9967,1.0167,1.0092,1.0065,0.9946,0.9778,0.9886,1.0117,1.0243,1.0266,0.996,1.0062,1.0095,0.9959,1.0009,1.0116,1.001,0.9802,1.0079,1.0072,0.9285,0.8061,1.0954,1.1772,0.9304,0.9441,1.0512,1.0772,1.029,1.0095,1.0311,1.0244,1.0521,0.9947,1.008,1.0024,0.9946,1.0133,1.0261,1.0051,0.9818,1.0239,1.0405,1.0259,1.0161,1.0194,0.9558,1.0037,0.9896,0.9994,1.0155,1.0171,1.0145,1.0062,1.0197,1.0051,0.9521,1.0516,0.9871,1.0191,1.0114,1.0247,0.9988,1.0179,0.9723,1.0407,1.0374,1.0123,1.0178,1.0062,1.0124,1.0071,0.9715,1.0026,0.9907,1.0357,0.9507,0.9556,1.0015,0.9757,1.0315,1.0254,0.9798,1.0029,0.9919,1.0345,1.0119,1.0106,1.0347,1.0004,0.9975,1.0127,0.9784,1.0197,0.9959,0.9728,1.0187,1.0096,1.0002,1.0123]
};

$('#plan-details').click(function () {
    $('#plan').formToWizard('GotoStep', 3);
});
$('#plan-rough').click(function () {
    $('#plan').formToWizard('GotoStep', 2);
});

setTimeout(function(){
    $('#plan').formToWizard('GotoStep', 2);
}, 2000);

$('#plan-save-2, #plan-save-3').click(function() { $('#askEmail').modal(); });

$('#askEmail').keypress(function(e){
    if ( e.which != 13 ) return;
    e.preventDefault();
    $('#askEmail .get-plan').click();
}).on('shown.bs.modal', function () {
    $('#modal-email').focus();
});

$('#askEmail .get-plan').click(function(event) {
    var email = $('#modal-email').val();
    var subscribe = $('#modal-subscribe').is(':checked');
    var re = /[^@]+@[^@]+.[a-zA-Z]{2,6}/;
    if (re.test(email)) {
        // Send confirmition mail
        $.post('/questionnaire/post', {
            action: 'confirm_email',
            email: email,
            subscribe: subscribe
        });
        $('#askEmail').data('sent', true).modal('hide');
    } else {
        // Cry and still on the modal
        event.preventDefault();
        alert('Please enter real email');
    }
});

// Create the bar chart
var barChart = new Highcharts.Chart({
    credits: { enabled: false },
    chart: {
        type: 'column',
        renderTo: 'plan-bar-chart',
        backgroundColor: '#eee'
    },
    title: {
        text: null
    },
    xAxis: {
        type: 'category',
        tickLength: 0,
        categories: [
            'U.S. Stocks',
            'Foreign Stocks',
            'Emerging Markets',
            'Dividend Stocks',
            'Real Estate',
            'TIPS',
            'Corporate Bonds',
            'Emerging Market Bonds'
        ]
    },
    yAxis: {
        min: -20,
        max: 40,
        title: {
            text: null,
            labels: {
                enabled: false
            }
        },
        labels: { enabled: false },
        gridLineWidth: 0
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
            animation: false,
            grouping: false,
            shadow: false
        },
        series: {
            borderWidth: 0,
            pointPadding: 0.01,
            groupPadding: 0.02,
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        var category = this.category;
                        $(".category-descr").each(function () {
                            var $this = $(this);
                            if ($this.attr('data-category') != category) {
                                $this.hide();
                            } else {
                                $this.stop().fadeToggle(450);
                            }
                        });
                    }
                }
            }
        }
    },

    series: [
        {
            name: 'Brands',
            colorByPoint: true,
            threshold: -20,
            dataLabels: {
                enabled: true,
                inside: false,
                format: '{point.y}%'
            },
            data: [
                {color:'#d76f32', y:6},
                {color:'#e1ab3a', y:5},
                {color:'#bdd15f', y:5},
                {color:'#70bb83', y:5},
                {color:'#70ccc1', y:5},
                {color:'#66bacc', y:25},
                {color:'#149ecc', y:35},
                {color:'#5c8ce5', y:14}
            ]
        },
        {
            name: 'xxx',
            color: 'rgba(255,255,255,0.5)',
            threshold: -20,
            dataLabels: {
                enabled: true,
                inside: true,
                allowOverlap: true,
                padding: 0,
                format: '{point.name}'
            },
            data: [
                {name: 'Vanguard VTI', y:0},
                {name: 'Vanguard VEA', y:0},
                {name: 'Vanguard VWO', y:0},
                {name: 'Vanguard VIG', y:0},
                {name: 'Vanguard VNQ', y:0},
                {name: 'Schwab SCHP',  y:0},
                {name: 'iShares LQD',  y:0},
                {name: 'iShares EMB',  y:0}
            ]
        },
    ],
    tooltip: {
        // to highlight both alltogether
        shared: true,
        enabled: true,
        // to not really show tooltip
        positioner: function () {return { x: -1000, y: -1000 };}
    }
});

function riskData(pct)
{
    // find nearest value for series
    for (i=0,n=riskToPct.length; i<n; i++) {
        data = riskToPct[i].data.slice(0);
        if (riskToPct[i].n >= pct) break;
    }
    return data;
}

var reactBriefPage = function() {
    var risk = $('input[name="risk"]').val();
    var data = riskData(risk);
    // skip empty data and category
    var categories = allCategories.slice(0);
    var names = allNames.slice(0);
    var colors = allColors.slice(0);
    for (i=categories.length-1; i>=0; i--) {
        if (data[i] <= 0) {
            data.splice(i, 1);
            categories.splice(i, 1);
            names.splice(i, 1);
            colors.splice(i, 1);
        }
    }
    // react chart
    var barChart = $('#plan-bar-chart').highcharts();
    var data0 = [], data1 = [];
    for (var key in data) {
        data0.push({y: data[key], color: colors[key]});
        data1.push({name: names[key], y: 0});
    }
    barChart.xAxis[0].setCategories(categories, false);
    barChart.series[0].setData(data0, false, false, true);
    barChart.series[1].setData(data1);
    return false;
}

$('#tolerance-2').spinedit({
    minimum: 0.5,
    maximum: 10,
    step: 0.5,
    numberOfDecimals: 1
}).on("valueChanged", function (e) {
    // save value
    params.risk = e.value;
    $('input[name="risk"]').val(e.value);
    reactBriefPage();
});


// Create the chart
var pieChart = new Highcharts.Chart({
    credits: { enabled: false },
    chart: {
        margin: [0, 0, 0, 0],
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        renderTo: 'plan-pie-chart'
    },
    title: { text: null },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: { enabled: false },
            showInLegend: false
        }
    },
    series: [{
        name: 'Part',
        colorByPoint: true,
        data: []
    }]
});

var gaugeChart = new Highcharts.Chart({
    credits: { enabled: false },

    chart: {
        margin: [0, 0, 0, 0],
        type: 'solidgauge',
        renderTo: 'detailed-gauge-chart'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '140%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    yAxis: {
        min: 0,
        max: 10,
        title: {
            text: null
        },
        stops: [
            [0.1, '#55BF3B'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.9, '#DF5353']  // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickPixelInterval: 400,
        tickWidth: 0,
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    },

    series: [{
        name: 'Speed',
        showInLegend: false,
        data: [2.5],
        dataLabels: {
            enabled: false
//            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
//            ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}%</span></div>'
        }
    }]

});

/*
 Tooltips base on HTML in forms
 */
/*
 //
 // Do not hide popover while hover
 // http://stackoverflow.com/a/18572669/272885
 //
 var originalLeave = $.fn.popover.Constructor.prototype.leave;
 $.fn.popover.Constructor.prototype.leave = function(obj){
 var self = obj instanceof this.constructor ?
 obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
 var container, timeout;

 originalLeave.call(this, obj);

 if(obj.currentTarget) {
 container = $(obj.currentTarget).siblings('.popover');
 timeout = self.timeout;
 container.one('mouseenter', function(){
 clearTimeout(timeout);
 container.one('mouseleave', function(){
 $.fn.popover.Constructor.prototype.leave.call(self, self);
 });
 })
 }
 };
 */
function tips(selector) {
    $(selector).each(function () {
        var $this = $(this);
        var placement = $this.data('placement');
        $this.popover({
            html: true,
            trigger: 'click hover',
            content: $('#' + $this.data('tip')).html(),
            placement: (placement ? placement : 'right'),
            container: 'body',
            delay: {show: 50, hide: 400}
        });
    });
}
tips('.tip');

var setDetailedSeries = function(pct, amount) {
    // save value
    $('input[name="risk"]').val(pct);
    // react gauge chart
    var gaugeChart = $('#detailed-gauge-chart').highcharts();
    gaugeChart.series[0].points[0].update(pct);

    var data = riskData(pct);
    // skip empty data and category
    var categories = allCategories.slice(0);
    var names = allNames.slice(0);
    var colors = allColors.slice(0);
    for (i=categories.length-1; i>=0; i--) {
        if (data[i] <= 0) {
            data.splice(i, 1);
            categories.splice(i, 1);
            names.splice(i, 1);
            colors.splice(i, 1);
        }
    }
    // react pie chart
    var pieChart = $('#plan-pie-chart').highcharts();
    var data0 = [];
    for (var key in data) {
        data0.push({y: data[key], color: colors[key], name: categories[key]});
    }
    pieChart.series[0].setData(data0);
    // react table
    tthtml = '';
    for (var key in data) {
        var rowPct = data[key]/100;
        var ttcolor = '<i style="background-color: ' + colors[key] + '"></i>';
        tthtml += '<tr>'+
            '<td>' + ttcolor +
                '<span class="tip" data-tip="tip-' + categories[key].toLowerCase().replace(/[ .]+/g,'-')+ '">' +
                categories[key] + '</span>' +
            '</td>' +
            '<td>' +
                '<span class="tip" data-tip="tip-' + names[key].toLowerCase().replace(/[ .]+/g,'-')+ '" data-placement="left">' +
                names[key] + '</span>' +
            '</td>' +
            '<td class="text-right">' + numeral(rowPct).format('0%') + '</td>' +
            '<td class="text-right">' + numeral(rowPct * amount).format('$0,0') + '</td>' +
            '</tr>';
    }
    $('#assets-table tbody').html(tthtml);
    tips('#assets-table tbody .tip');
}

function etfFee(pct) {
    var etfExpenses = {"US_STOCKS":0.0005,"INTL_DEVELOPED":0.0009,"INTL_EMERGING":0.0015,"REAL_ESTATE":0.0012,"COMMODITIES":0.0014,"BONDS":0.0007,"INFL_BONDS":0.0007,"MUNI_BONDS":0.0025,"EM_BONDS":0.004,"DIV_STOCKS":0.001,"CORP_BONDS":0.0015};
    var data = riskData(pct);
    var fee = 0;
    for (i=0,n=data.length; i<n; i++) {
        var r = stocksOrder[i];
        fee += etfExpenses[r] * data[i];
    }
    return fee / 100;
}

function reactDetailedPage()
{
    var pct = params.risk;
    var amount = params.amount;
    // Assets table
    setDetailedSeries(pct, amount);
    // Historical tab
    var series = $('#historical-chart').highcharts().series[1];
    series.setData(growth(pct, amount));
    $('#benchmark-select').trigger('change');
    // Costs tab
    $('#etf-fee').html(numeral(etfFee(pct)).format('0.00%'));
    $('#cost-amount').html(numeral(amount).format('$0,0'));
    $('#cost-effective').html(numeral(Math.max(0, .0025 * (amount - 10000) / amount)).format('0.00%'));
    // Projection tab
    projectionChart.yAxis[0].update({}, true); // change axis labels
    projectionChart.slide( parseInt($('#slider').val()) ); // change tooltip text
}

$('#tolerance-3').spinedit({
    minimum: 0.5,
    maximum: 10,
    step: 0.5,
    numberOfDecimals: 1
}).on("valueChanged", function (e) {
    // save value
    params.risk = e.value;
    $('input[name="risk"]').val(e.value);
    reactDetailedPage();
});

$('#amount-3').change(function() {
    params.amount = Math.max(500, ~~$('#amount-3').val());
    reactDetailedPage();
});

$('#plan').on('select.wizard', function(event, form, step) {
    var id = step.prop('id');
    params.risk = parseInt($('input[name="risk"]').val());
    var askEmailDialog = $('#askEmail');

    switch (id) {
        case 'step1':
            $('#tolerance-2').spinedit('setValue', params.risk);
            reactBriefPage();
            if (askEmailDialog.length && !(askEmailDialog.data('sent')))
                askEmailDialog.modal();
            break;
        case 'step2':
            $('#tolerance-3').spinedit('setValue', params.risk);
            reactDetailedPage();
            if (askEmailDialog.length && !(askEmailDialog.data('sent')))
                askEmailDialog.modal();
            $('#projection-chart').highcharts().reflow(); // workaround
            break;
    }
})

/*
    Historical Preformance chart
 */
var composeSeries = function(pct) {
    var data, x;
    for (i=0,n=riskToPct.length; i<n; i++) {
        data = riskToPct[i].data.slice(0);
        if (riskToPct[i].n >= pct) break;
    }
    var result = [];
    var stocksLen = stocks["US_STOCKS"].length;
    var dataLen = data.length;
    for (i=0; i<stocksLen; i++) {
        x = 0;
        for (j=0; j<dataLen; j++) {
            x += data[j] /100 * stocks[stocksOrder[j]][i];
        }
        result.push(x);
    }
    return result;
}

var growth = function (data, amount) {
    var u = [];
    var x = amount;
    //var isArray = Object.prototype.toString.call(data) === '[object Array]';
    if (typeof data === 'number') {
        data = composeSeries(data);
    }
    for (var i = 0, n = data.length; i < n; i++) {
        u.push(x);
        x *= data[i];
    }
    return u;
}

$('#benchmark-select').change(function() {
    var index = $('#benchmark-select').val();
    var series = $('#historical-chart').highcharts().series[0];
    var amount = params.amount;
    if (!index) {
        series.hide();
        return;
    }
    series.setData(growth(stocks[index], amount));
    series.show();
});

// Create the History Performance Chart
var historyChart = new Highcharts.Chart({
    credits: { enabled: false },
    chart: {
        type: 'line',
        renderTo: 'historical-chart'
    },
    title: {
        text: null
    },
    yAxis: {
        opposite: true,
        title: {
            text: null
        }
    },
    xAxis: {
        labels: {
            enabled: true,
            step: 2,
            formatter: function () {
                return (1998 + this.value / 12);
            }
        },
        tickInterval: 12,
        minorTickInterval: 12
    },
    tooltip: { enabled: false },
    legend: { enabled: false  },
    plotOptions: {
        line: {
            marker: { enabled: false },
            states: { hover: { enabled: false} }
        }
    },
    series: []
}, function(chart) {
    var amount = params.amount;
    var pct = params.risk;
    chart.addSeries({
        name: 'U.S. Stocks',
        color: '#ffa800',
        data: growth(stocks["US_STOCKS"], amount),
        visible: false
    });
    chart.addSeries({
        name: 'Your',
        color: '#7bc455',
        data: growth(pct, amount)
    });
});


/*
    Create Projected Performance Chart
 */
var projectionChart = new Highcharts.Chart({
    credits: {
        enabled: false
    },
    chart: {
        renderTo: 'projection-chart',
        type: 'column',
        marginLeft: 10,
        marginRight: 55
    },
    colors: [{
        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
        stops: [
            [0, 'rgba(23, 146, 23, 0.1)'],
            [1, 'rgba(23, 146, 23, 0.6)']
        ]
    },
        {
            linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
            stops: [
                [0, 'rgba(23, 146, 23, 0.6)'],
                [1, 'rgba(23, 146, 23, 0.1)']
            ]
        },
        {
            linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
            stops: [
                [0, 'rgba(146, 146, 146, 0.3)'],
                [1, 'rgba(246, 246, 246, 0.1)']
            ]
        }
    ],
    title: { text: '' },
    yAxis: {
        min: -100,
        max: 400,
        title: { enabled: false },
        opposite: true,
        labels: {
            formatter: function() {
                var x = ((this.value + 100) / 100).toFixed(0) * params.amount;
                if(x >= 1e9){
                    return numeral(x/1e9).format('$0,0.0')+'G';
                } else if(x >= 1e6){
                    return numeral(x/1e6).format('$0,0.0')+'M';
                } else if(x >= 1e3 ){
                    return numeral(x/1e3).format('$0,0.0')+'k';
                }
                return numeral(x).format('$0,0');
            }
        }
    },
    xAxis: {
        labels: {
            enabled: true,
            step: 3,
            formatter: function () {
               return (this.value / 12);
            }
        },
        gridLineWidth: 0,
        tickInterval: 4,
        minorTickInterval: 4,
        plotLines: [{
            color: '#BBB',
            width: 5,
            value: 60,
            zIndex: 5
        }]
    },
    legend: {
        enabled: false
    },
    tooltip: {
        shared: true,
        useHTML: true,
        borderWidth: 0
    },

    plotOptions: {
        series: {
            pointPadding: 0,
            groupPadding: 0,
            animation: false
        },
        column: {
            stacking: 'normal',
            grouping: false,
            shadow: false,
            borderWidth: 0,
            states: { hover: { enabled: false} }
        }
    },
    series: [
        {
            name: 'Index Funds Over Mutual Funds',
            enableMouseTracking: false,
            data: []
        },
        {
            name: 'Tax-Loss Harvesting',
            data: []
        },
        {
            name: 'Lose risk',
            data: []
        }

    ]
},
function (chart) {
    var line = chart.xAxis[0].plotLinesAndBands[0]
        , tipOn = false;
    function drawLine(x)
    {
        if (typeof chart === 'undefined') return false;

        line.options.value = x;
        line.render();

        tipOn = true;
        chart.tooltip.hide();
        chart.tooltip.refresh([
            chart.series[1].points[x],
            chart.series[2].points[x]
        ]);
        tipOn = false;
    }
    var amount=20;
    var data1=[], data2=[], data3=[];
    for (var i=0; i<120; i++) {
        data1.push(i*amount*(44/12/100)*2);
        data2.push(i*amount*(44/12/100));
        data3.push(-(120-i)*amount*(5/12/100));
    }
    chart.series[0].setData(data1);
    chart.series[1].setData(data2);
    chart.series[2].setData(data3);
    var xaxis = chart.axes[0];
    var slider = new Slider('#slider', {
        id: 'slider-control',
        min: xaxis.min,
        max: xaxis.max,
        value: (xaxis.min+xaxis.max)/2,
        tooltip: 'hide',
//        ticks: [0, 23, 47, 71, 95, 119],
//        ticks_labels: ['0', '2', '4', '6', '8', '10']
    }).on('change', function(event) {
        drawLine(event.newValue);
    });
    chart.tooltip.hide = function () {};
    chart.tooltip.options.formatter = function () {
        if (!tipOn) return false;
        var points = this.points;
        var html = '';
        html += points[0].series.name + ': <b>' + (points[0].y).toFixed(2)  + '</b><br/>';
        html += points[1].series.name + ': <b>' + (-points[1].y).toFixed(2)  + '%</b><br/>';
        return html;
    }
    chart.slide = function(value) {
        slider.setValue(value);
        drawLine(value);
    }
});

});
