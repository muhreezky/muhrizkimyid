<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Education;

use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class EducationEditScreen extends Screen
{
    /** @var Education|null */
    public $education;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(Education $education): iterable
    {
        return [
            'education' => $education,
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Edit Education';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'Modify the education details.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.education.edit',
        ];
    }

    /**     * The screen's action buttons.
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**     * The screen's layout elements.
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                EducationEditLayout::class,
            ])
                ->title('Education')
                ->description('Add or edit an education entry.'),
        ];
    }

    /**     * @return RedirectResponse
     */
    public function save(Request $request, Education $education): RedirectResponse
    {
        $request->validate([
            'education.institution' => 'required',
            'education.degree' => 'required',
            'education.start_date' => 'required',
        ]);

        $education->fill($request->get('education'));
        $education->save();

        Toast::info(__('Education was saved'));

        return redirect()->route('platform.education.index');
    }
}