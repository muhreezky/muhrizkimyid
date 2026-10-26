<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Project;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class ProjectEditScreen extends Screen
{
    /** @var Project|null */
    public $project;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(Project $project): iterable
    {
        return [
            'project' => $project,
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Edit Project';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'Modify the project details.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.project.edit',
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
                ProjectEditLayout::class,
            ])
                ->title('Project')
                ->description('Add or edit a portfolio project.'),
        ];
    }

    /**     * @return RedirectResponse
     */
    public function save(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'project.title' => 'required',
            'project.description' => 'required',
        ]);

        $project->fill($request->get('project'));
        $project->save();

        Toast::info(__('Project was saved'));

        return redirect()->route('platform.project.index');
    }
}