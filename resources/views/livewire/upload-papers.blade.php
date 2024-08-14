<div>
    <div class="flex items-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
          <div class="max-w-xl mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
              <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-400">
                Add Paper
              </h1>
              <p class="text-gray-400 dark:text-gray-400">
                Upload a paper
              </p>
            </div>
            <div class="m-7">
              <form wire:submit.prevent='save'  method="POST" enctype="multipart/form-data">
                <input type="checkbox" name="botcheck" id="" style="display: none;" />
                <input type="hidden" name="redirect" value="https://web3forms.com/success">

                <div class="flex mb-6 space-x-4">
                  <div class="w-full md:w-1/2">
                    <label for="title" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Title</label>
                    <input type="text" wire:model='title' name="title" id="title" placeholder="title" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-dark dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="w-full md:w-1/2">
                    <label for="year" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Year</label>
                    <select id="year" name="year" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        <?php
                        $currentYear = date("Y");
                        $startYear = 1900;
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            echo "<option value='$year'>$year</option>";
                        }
                        ?>

                    </select>
                    @error('year') <span class="text-red-400">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="flex mb-6 space-x-4">

                    <div class="w-full md:w-1/2">
                        <label for="classId" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Class</label>
                        <select id="classId" wire:model="subjectId" name="subjectId" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                            @foreach ($classes as $cl )
                            <option  value='{{ $cl->id }}'>{{ $cl->name }}</option>
                            @endforeach
                        </select>
                        @error('classId') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full md:w-1/2">
                        <label for="subjectId" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Subject</label>
                        <select  id="subjectId" wire:model="subjectId" name="subjectId" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                            @foreach ($subjects as $subject )
                            <option value='{{ $subject->id }}'>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subjectId') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>



                </div>
                <div class="flex mb-6 space-x-4">
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Upload Paper E.g pdf</label>
                        <input wire:model='paper' type="file" id="attachment" name="paper" accept=".pdf,.doc,.docx" />

                        @error('paper') <span class="text-red-400">{{ $message }}</span> @enderror
                      </div>

                    <div class="w-full md:w-1/2">
                        <label for="price" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Price</label>
                        <input type="text" wire:model='price' name="price" id="price" placeholder="Price" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:text-dark dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        @error('price') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-6">
                  <button type="submit"  {{ $uploading == true ? 'disabled' : "" }} class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                    Upload Paper
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
