<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            font-family: 'Segoe UI', Tahoma, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .work-tracker-box {
            max-width: 800px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 24px;
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Header Section */
        .work-header {
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .work-header h2 {
            font-size: 26px;
            margin: 0;
            color: #4c1d95;
            font-weight: 700;
            text-align: center;
            animation: slideDown 0.8s ease-in-out;
        }

        /* Work Details Section */
        .work-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .work-details div {
            background: #f9fafb;
            padding: 14px 16px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            color: #374151;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* Add a soft gradient hover effect */
        .work-details div::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 200%;
            height: 100%;
            background: linear-gradient(120deg, rgba(79, 70, 229, 0.08), rgba(236, 72, 153, 0.08));
            transition: left 0.4s ease;
            z-index: 0;
        }

        .work-details div:hover::before {
            left: 0;
        }

        .work-details div:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
        }

        /* Add icons */
        .work-details div i {
            font-size: 18px;
            color: #4f46e5;
            flex-shrink: 0;
        }

        .work-details strong {
            display: block;
            font-size: 13px;
            color: #6b7280;
        }

        .work-details span {
            font-size: 14px;
            color: #111827;
            font-weight: 600;
        }


        /* Stepper Styles */
        .stepper-box {
            padding: 0;
            width: 100%;
        }

        .stepper-step {
            display: flex;
            margin-bottom: 32px;
            position: relative;
            opacity: 0;
            transform: translateX(-50px);
            animation: slideUp 0.8s ease forwards;
        }

        .stepper-step:nth-child(n) {
            animation-delay: calc(0.2s * var(--i));
        }


        .stepper-line {
            position: absolute;
            left: 19px;
            top: 40px;
            bottom: -32px;
            width: 2px;
            background-color: #e2e8f0;
            z-index: 1;
        }

        .stepper-step:last-child .stepper-line {
            display: none;
        }

        .stepper-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            z-index: 2;
            font-weight: bold;
            transition: all 0.4s ease;
        }

        .stepper-completed .stepper-circle {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            box-shadow: 0 4px 10px rgba(34, 197, 94, 0.4);
        }

        .stepper-active .stepper-circle {
            border: 3px solid #4f46e5;
            color: #4f46e5;
            background: #eef2ff;
        }

        .stepper-pending .stepper-circle {
            border: 2px solid #d1d5db;
            color: #9ca3af;
        }

        .stepper-content {
            flex: 1;
        }

        .stepper-title {
            font-weight: 700;
            margin-bottom: 4px;
            font-size: 16px;
        }

        .stepper-status {
            font-size: 13px;
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            margin-top: 4px;
        }

        .stepper-completed .stepper-status {
            background: #dcfce7;
            color: #166534;
        }

        .stepper-active .stepper-status {
            background: #e0e7ff;
            color: #3730a3;
        }

        .stepper-pending .stepper-status {
            background: #f3f4f6;
            color: #6b7280;
        }

        .stepper-time {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* Buttons */
        .stepper-controls {
            display: flex;
            justify-content: space-between;
            margin-top: 32px;
        }

        .stepper-button {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            background: #f3f4f6;
            color: #111827;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .stepper-button:hover {
            background: #e0f2fe;
            transform: scale(1.05);
        }

        .stepper-button-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
        }

        .stepper-button-primary:hover {
            background: linear-gradient(135deg, #4338ca, #4f46e5);
            transform: scale(1.08);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }


        /* abhii */
        /* From Uiverse.io by vinodjangid07 */
.Documents-btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: fit-content;
  height: 45px;
  border: none;
  padding: 0px 17px;
  border-radius: 5px;
  background: linear-gradient(to left bottom, #9b3ce8, #3386ef, #13bcec);
  gap: 8px;
  cursor: pointer;
  transition: all 0.3s;
}
.folderContainer {
  width: 40px;
  height: fit-content;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-end;
  position: relative;
}
.fileBack {
  z-index: 1;
  width: 80%;
  height: auto;
}
.filePage {
  width: 50%;
  height: auto;
  position: absolute;
  z-index: 2;
  transition: all 0.3s ease-out;
}
.fileFront {
  width: 85%;
  height: auto;
  position: absolute;
  z-index: 3;
  opacity: 0.95;
  transform-origin: bottom;
  transition: all 0.3s ease-out;
}
.text {
  color: white;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 0.5px;
}
.Documents-btn:hover .filePage {
  transform: translateY(-5px);
}
.Documents-btn:hover {
  background-color: rgb(58, 58, 94);
}
.Documents-btn:hover .fileFront {
  transform: rotateX(30deg);
}

    </style>
</head>

<body>
    <div class="work-tracker-box">
        <!-- Work Info -->
        <div class="work-header">
            <h2>Work Tracker</h2>
            <div class="work-details">
                <div>
                    <i class="fas fa-briefcase"></i>
                    <div>
                        <strong>Work</strong>
                        <span>{{ $work->work_name }}</span>
                    </div>
                </div>
                <div>
                    <i class="fas fa-user"></i>
                    <div>
                        <strong>Allocated To</strong>
                        <span>{{ $work->client->name }}</span>
                    </div>
                </div>
                <div>
                    <i class="fas fa-calendar-alt"></i>
                    <div>
                        <strong>Start Date</strong>
                        <span>{{ \Carbon\Carbon::parse($work->created_at)->format('d/m/Y') }}</span>
                    </div>
                </div>
                <div>
                    <i class="fas fa-layer-group"></i>
                    <div>
                        <strong>Category</strong>
                        <span>{{ $work->category->name }}</span>
                    </div>
                </div>
                <div>
                    <i class="fas fa-university"></i>
                    <div>
                        <strong>Bank</strong>
                        <span>{{ $work->bank->bank_name }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Steps -->
        <div class="stepper-box">
            @php
                // Determine the first incomplete step index
                $firstIncompleteIndex = null;
                foreach ($work->category->steps as $i => $s) {
                    if (!isset($completedSteps[$s->id]) || $completedSteps[$s->id] !== 'completed') {
                        $firstIncompleteIndex = $i;
                        break;
                    }
                }
            @endphp

            <!-- Required Documents -->
            @if ($work->category->requiredDocs->count())
                <div class="required-docs"
                    style="margin: 20px 0; padding: 16px; background: #f9fafb; border-radius: 12px;">
                    <h3 style="margin-bottom: 12px; font-size: 18px; color: #4c1d95;">
                        <i class="fas fa-file-alt" style="margin-right: 8px; color: #6d28d9;"></i> Required Documents
                    </h3>
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($work->category->requiredDocs as $doc)
                            <li style="margin-bottom: 6px; color: #374151; font-size: 14px;">
                                {{ $doc->doc_name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif



            @foreach ($work->category->steps as $index => $step)
                @php
                    if ($index < $firstIncompleteIndex) {
                        $status = 'completed';
                    } elseif ($index === $firstIncompleteIndex) {
                        $status = 'in-progress';
                    } else {
                        $status = 'pending';
                    }

                    $stepClass = '';
                    $circleText = $index + 1;

                    if ($status === 'completed') {
                        $stepClass = 'stepper-completed';
                        $circleText = '✓';
                    } elseif ($status === 'in-progress') {
                        $stepClass = 'stepper-active';
                    } else {
                        $stepClass = 'stepper-pending';
                    }

                    // Fetch the related work step record for this category step
                    $workStep = $work->workSteps->firstWhere('category_step_id', $step->id);

                    // Fetch selected option IDs for this work step
                    $selectedOptions = $work->workStepOptions
                        ->where('category_step_id', $step->id)
                        ->pluck('option_id')
                        ->toArray();

                @endphp

                <div class="stepper-step {{ $stepClass }}" style="--i: {{ $index + 1 }}">
                    <div class="stepper-circle">{{ $circleText }}</div>
                    @if (!$loop->last)
                        <div class="stepper-line"></div>
                    @endif
                    <div class="stepper-content">
                        <div class="stepper-title">

                            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                                {{-- Step Name --}}
 {{ $step->step_name }}

                            @if ($step->step_type == 'copy_option')
                                <a href="https://api.whatsapp.com/send?phone=+917016314980&text=i need one copy of this document" class="Documents-btn" style="scale: 0.75">
                                    <span class="folderContainer">
                                        <svg class="fileBack" width="146" height="113" viewBox="0 0 146 113"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 4C0 1.79086 1.79086 0 4 0H50.3802C51.8285 0 53.2056 0.627965 54.1553 1.72142L64.3303 13.4371C65.2799 14.5306 66.657 15.1585 68.1053 15.1585H141.509C143.718 15.1585 145.509 16.9494 145.509 19.1585V109C145.509 111.209 143.718 113 141.509 113H3.99999C1.79085 113 0 111.209 0 109V4Z"
                                                fill="url(#paint0_linear_117_4)"></path>
                                            <defs>
                                                <linearGradient id="paint0_linear_117_4" x1="0" y1="0"
                                                    x2="72.93" y2="95.4804" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#a040fd"></stop>
                                                    <stop offset="1" stop-color="#5f41f3"></stop>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                        <svg class="filePage" width="88" height="99" viewBox="0 0 88 99"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="88" height="99" fill="url(#paint0_linear_117_6)"></rect>
                                            <defs>
                                                <linearGradient id="paint0_linear_117_6" x1="0" y1="0"
                                                    x2="81" y2="160.5" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white"></stop>
                                                    <stop offset="1" stop-color="#686868"></stop>
                                                </linearGradient>
                                            </defs>
                                        </svg>

                                        <svg class="fileFront" width="160" height="79" viewBox="0 0 160 79"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.29306 12.2478C0.133905 9.38186 2.41499 6.97059 5.28537 6.97059H30.419H58.1902C59.5751 6.97059 60.9288 6.55982 62.0802 5.79025L68.977 1.18034C70.1283 0.410771 71.482 0 72.8669 0H77H155.462C157.87 0 159.733 2.1129 159.43 4.50232L150.443 75.5023C150.19 77.5013 148.489 79 146.474 79H7.78403C5.66106 79 3.9079 77.3415 3.79019 75.2218L0.29306 12.2478Z"
                                                fill="url(#paint0_linear_117_5)"></path>
                                            <defs>
                                                <linearGradient id="paint0_linear_117_5" x1="38.7619" y1="8.71323"
                                                    x2="66.9106" y2="82.8317" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#a040fd"></stop>
                                                    <stop offset="1" stop-color="#5251f2"></stop>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </span>
                                    <p class="text">Need One Copy</p>
                                </a>
                            @endif
                            </div>


                        </div>
                        <div class="stepper-status">
                            @if ($status === 'completed')
                                Completed
                            @elseif($status === 'in-progress')
                                In Progress
                            @else
                                Pending
                            @endif
                        </div>
                        <div class="stepper-time">
                            @if ($status === 'completed')
                                {{ \Carbon\Carbon::parse($step->completed_at)->format('M d') }}
                            @elseif($status === 'in-progress')
                                Started: {{ \Carbon\Carbon::parse($step->started_at)->format('M d') }}
                            @else
                                {{-- Estimated: {{ now()->addDays(3)->format('M d') }} --}}
                            @endif
                        </div>

                        {{-- ✅ Show Step Options --}}
                        @if ($step->options->count())
                            <div class="step-options mt-2">
                                <strong>Options:</strong>
                                <ul>
                                    @foreach ($step->options as $option)
                                        <li
                                            style="color: {{ in_array($option->id, $selectedOptions) ? 'green' : '#555' }}; font-weight: {{ in_array($option->id, $selectedOptions) ? 'bold' : 'normal' }}">
                                            {{ $option->option_name }}
                                            @if (in_array($option->id, $selectedOptions))
                                                ✅
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach

        </div>
    </div>


</body>

</html>
