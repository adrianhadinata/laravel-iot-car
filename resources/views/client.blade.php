
<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
  <form>
    <div class="bg-white p-8 rounded-sm">
      <div class="border-b border-gray-900/10 pb-12">

        <h2 class="text-base font-semibold leading-7 text-gray-900">Broker Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Fill the requirement based on your broker</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <x-label for="host" is-required="true">Host / IP Address</x-label>
            <div class="mt-2">
              <x-input-field name="host" id="host" autocomplete="host" placeholder="e.g. test.mosquitto.org" required/>
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <x-label for="port" is-required="true">Port</x-label>
            <div class="mt-2">
              <x-input-field type="number" name="port" id="port" autocomplete="port" placeholder="e.g. 8080" required/>
            </div>
          </div>

          <div class="sm:col-span-3">
            <x-label for="username">Username</x-label>
            <div class="mt-2">
              <x-input-field type="text" name="username" id="username" autocomplete="username" placeholder="e.g. username" />
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <x-label for="password">Password</x-label>
            <div class="mt-2">
              <x-input-field type="password" name="password" id="password" autocomplete="password" placeholder="********" />
            </div>
          </div>

          <div class="col-span-full">
            <x-label for="topic" is-required="true">Topic</x-label>
            <div class="mt-2">
              <x-input-field type="text" name="topic" id="topic" autocomplete="topic" placeholder="#" required/>
            </div>
          </div>

          <div class="col-span-full">
            <x-button type="submit" button-color="indigo">Connect</x-button>
            <x-button type="button" button-color="red">Disconnect</x-button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <form>
    <div class="bg-white p-8 rounded-sm">
      <div class="border-b border-gray-900/10 pb-12">

        <h2 class="text-base font-semibold leading-7 text-gray-900">Send Message</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Send your topic and message through the broker</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="col-span-full">
            <x-label for="topicForSend" is-required="true">Topic</x-label>
            <div class="mt-2">
              <x-input-field name="topicForSend" id="topicForSend" autocomplete="topicForSend" placeholder="e.g. #" required/>
            </div>
          </div>
  
          <div class="col-span-full">
            <x-label for="message" is-required="true">Message</x-label>
            <div class="mt-2">
              <x-input-field type="number" name="message" id="message" autocomplete="message" placeholder="e.g. Hello World!" required/>
            </div>
          </div>

          <div class="col-span-full">
            <x-button type="submit" button-color="green">Send</x-button>
          </div>

        </div>
      </div>
    </div>
  </form>

  <div class="bg-white p-8 rounded-sm">
    <div class="border-b border-gray-900/10 pb-12">

      <h2 class="text-base font-semibold leading-7 text-gray-900">Receive Data</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Listen to your topic</p>

      <div id="message" class="w-full h-1/2 border-2 min-h-96 border-black mt-12">

      </div>
    </div>
  </div>
  
</x-layout>