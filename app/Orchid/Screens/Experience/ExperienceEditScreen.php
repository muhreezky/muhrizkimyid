<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Experience;

use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class ExperienceEditScreen extends Screen
{
    /** @var Experience|null */
    public $experience;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(Experience $experience): iterable
    {
        return [
            'experience' => $experience,
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Edit Experience';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'Modify the experience details.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.experience.edit',
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
                ExperienceEditLayout::class,
            ])
                ->title('Experience')
                ->description('Add or edit a work experience.'),
        ];
    }

    /**     * @return RedirectResponse
     */
    public function save(Request $request, Experience $experience): RedirectResponse
    {
        $request->validate([
            'experience.title' => 'required',
            'experience.company' => 'required',
            'experience.position' => 'required',
            'experience.start_date' => 'required',
        ]);

        $experience->fill($request->get('experience'));
        $experience->save();

        Toast::info(__('Experience was saved'));

        return redirect()->route('platform.experience.index');
    }
}