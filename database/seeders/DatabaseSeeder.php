<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        echo("Running Database Seeder for " . env('APP_NAME'));
        $this->destroyWorld();
        $this->createWorld();

        echo("\n");
    }

    public function destroyWorld()
    {
        echo("\nDestroying the " . env('APP_NAME') . " world as we know it...");

        //Different from DB::raw, unprepared allows multiline sql statements
        DB::unprepared('
            SET FOREIGN_KEY_CHECKS = 0;

            TRUNCATE users;
            TRUNCATE apps;

            SET FOREIGN_KEY_CHECKS = 1;
            ');
    }

    public function createWorld()
    {
        echo("\nCreating world for " . env('APP_NAME') . "\n");

        $this->josh = User::create([
            'email' => 'fr.mccarty@gmail.com',
            'name' => 'Josh McCarty',
            'password' => bcrypt('abc123'),
            'email_verified_at' => now(),
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Sheet Music',
            'description' => 'Upload scanned images of your music, identify the individual pieces, search for the pieces, and then print them for a great liturgical event.',
            'content' => 'The Sheet Music App is a powerful tool designed to help you manage and organize large quantities of music stored in PDF format. Whether you are a music director, a pastor, a member of a pastoral team, or an entrepreneur, this app simplifies the process of handling musical pieces for various events or liturgical services like a Catholic Mass.

Key Features:

	1.	Import PDFs: Easily import multiple PDF files containing music scores into the app.
	2.	Identify Music Pieces: The app intelligently scans your PDFs to identify individual pieces of music, making it easy to locate specific songs or hymns.
	3.	Assemble Musical Events: Once the pieces are identified, you can effortlessly assemble them into a cohesive sequence for any event or service. Create a structured order for a liturgical service or any musical event with just a few clicks.
	4.	User-Friendly Interface: The app is designed with a simple and intuitive interface, making it accessible for users of all technical levels.
	5.	Flexible Usage: Perfect for organizing music for church services, community events, or any occasion where a collection of musical pieces is needed.

With the Music Organizer App, you can save time and ensure that your musical events are well-organized and beautifully executed. This tool is an essential addition to your toolkit, providing efficiency and ease in managing your music library.',
            'is_active' => 1,
            'font_awesome' => 'music',
            'custom_logo' => null,
            'url' => 'music',
            'project_path' => 'music',
            'public_url' => 'https://music.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Marriage Preparation',
            'description' => 'Track the marriage preparation for all the couples in your parish',
            'content' => 'The Marriage Preparation App is a helpful tool for anyone working with couples preparing for marriage. This app makes it easy to keep track of everything needed for each preparation session. It helps manage liturgical requirements and options, ensuring that everything is in place for the ceremony.

Key Features:

	1.	Session Content Management: Easily keep track of the content covered in each preparation session. This helps ensure that all important topics are discussed and nothing is overlooked.
	2.	Liturgical Requirements: The app helps you manage and keep track of all the liturgical requirements and options, making sure everything is ready for the ceremony.
	3.	Canonical Requirements: Keep track of all canonical requirements that the couples must complete for both the parish and the diocese. This includes all necessary paperwork and procedures.
	4.	Print Summary: At the end of the preparation, the app can print out a summary of all the sessions, along with the liturgical readings. These can be easily placed in a binder and used at the church.
	5.	User-Friendly Interface: The app is designed to be simple and easy to use, making it accessible for everyone, regardless of their technical skills.

With the Marriage Preparation App, you can ensure that couples are fully prepared for their big day. This tool is an essential addition for anyone involved in marriage preparation, providing organization and efficiency in managing all the necessary requirements.',
            'is_active' => 1,
            'font_awesome' => 'user',
            'custom_logo' => 'marriage-logo.svg',
            'url' => 'marriage',
            'project_path' => 'marriage',
            'public_url' => 'https://marriage.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Team Feedback',
            'description' => 'Ask for and collect feedback for your preachers quickly',
            'content' => '### Feedback Team App

The Feedback Team App is a web application designed to help individuals assemble a team and gather feedback on their activities. Originally created for homilists to receive feedback on their weekend homilies, this app is versatile and can be used for various activities across an organization.

**Key Features:**

1. **Team Assembly:** Easily assemble a team to provide feedback on your activities. You can choose team members who will give you valuable insights and constructive criticism.

2. **Event Naming:** The homilist or a secretary can name an event when the preacher preached. This makes it simple to keep track of different occasions and the feedback associated with each one.

3. **Automated Feedback Requests:** The app automatically sends customized questions to the feedback team after the event. This ensures that feedback is gathered promptly and efficiently.

4. **Customizable Questions:** All feedback questions are fully customizable, allowing you to tailor them to your specific needs and get the most relevant feedback.

5. **Track Feedback:** The app makes it easy to track feedback for multiple people from multiple teams across an organization. This is perfect for larger groups where many individuals need to be reviewed.

6. **User-Friendly Interface:** Designed to be easy to use, the app is accessible for everyone, regardless of their technical skills.

With the Feedback Team App, you can ensure that you receive detailed and organized feedback from your team. This tool is essential for anyone looking to improve their performance through constructive feedback, whether you are a homilist, a pastor, or an entrepreneur.',
            'is_active' => 1,
            'font_awesome' => 'bullhorn',
            'custom_logo' => null,
            'url' => 'feedback',
            'project_path' => 'feedback',
            'public_url' => 'https://feedback.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Newman Center Database',
            'description' => 'A Catholic Center Database designed to help connect students, alumni, and friends',
            'content' => '### Newman Center Database

The Newman Center Database is a user-friendly application designed to help manage and track important information related to students at a Newman Center. This app is perfect for pastors, pastoral teams, and anyone involved in student ministry.

**Key Features:**

1. **Input Student Information:** Easily input the names, contact information, and family details of individual students. Keep all student data organized in one place.

2. **Parish and Knights of Columbus:** Track which parish each student belongs to and their connection to any Knights of Columbus Council. This helps in maintaining a comprehensive record of each student’s affiliations.

3. **Customizable Forms:** The app includes a form that can be published online, allowing students or their families to input their information directly. This makes it simple to gather and update student data.

4. **Easy Tracking:** The Newman Center Database provides an easy way to track all relevant information, ensuring that nothing is overlooked and everything is kept up-to-date.

5. **User-Friendly Interface:** Designed to be simple and intuitive, the app is accessible for everyone, regardless of their technical skills.

With the Newman Center Database, managing student information has never been easier. This tool is essential for any Newman Center, providing efficiency and organization in tracking student data and affiliations.',
            'is_active' => 1,
            'font_awesome' => 'graduation-cap',
            'custom_logo' => null,
            'url' => 'newman',
            'project_path' => 'newman',
            'public_url' => 'https://newman.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Document Recipe',
            'description' => 'A tool for creating collections of pdfs that need to be printed out for various circumstances',
            'content' => '### Document Recipe

The Document Recipe app is a practical tool designed to help users manage and organize multiple PDF documents into a single master document. This app is especially useful for teams who need to handle and distribute numerous paper forms to their clients.

**Key Features:**

1. **Input Multiple PDFs:** Easily upload and input a number of PDF documents into the app. This feature simplifies the process of managing large quantities of documents.

2. **Construct a Master Document:** Combine individual PDFs into a single master document. This master document can contain all the necessary forms and information in one place.

3. **Name and Description:** Give the master document a clear name and description. This helps users understand its intended purpose and contents at a glance.

4. **Information Clarity:** Add additional information to the master document to make its purpose and contents very clear to users. This ensures that everyone knows exactly what the document is for and how to use it.

5. **User-Friendly Interface:** The app is designed to be simple and easy to use, making it accessible for users of all technical skill levels.

With the Document Recipe app, you can streamline the process of managing and distributing important forms. This tool is essential for any team needing to organize and handle multiple documents efficiently, providing clarity and ease in document management.',
            'is_active' => 1,
            'font_awesome' => 'file',
            'custom_logo' => null,
            'url' => 'document',
            'project_path' => 'document-recipe',
            'public_url' => 'https://document.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'IdeaSync',
            'description' => 'Capture your ideas on the Go and share them with your team',
            'content' => '### IdeaSync

IdeaSync is a simple and efficient app designed for sharing ideas with your team while you\'re on the go. Whether you\'re on a skateboard, in a car, or anywhere else, IdeaSync makes it easy to capture and share your thoughts quickly.

**Key Features:**

1. **Easy Audio Recording:** Start recording your ideas effortlessly with just a tap. This feature is perfect for capturing inspiration no matter where you are.

2. **Idea Buckets:** Drop your audio recordings into a virtual bucket. Each bucket can be shared with your team, making collaboration seamless.

3. **Automatic Transcription:** Once an idea is offloaded into a bucket, it is automatically transcribed. This means you and your team can access both the audio recording and the written text.

4. **Quick and Simple:** IdeaSync is designed to be straightforward and quick to use. It\'s ideal for busy people who need to offload their ideas without any hassle.

    5. **Team Collaboration:** Your team can easily access and review the transcribed ideas and the original audio recordings. This fosters better communication and collaboration within your team.

    With IdeaSync, you can ensure that no great idea is ever lost. This app is perfect for anyone needing to capture and share their thoughts on the go, providing a quick and efficient way to manage and collaborate on new ideas.',
            'is_active' => 1,
            'font_awesome' => null,
            'custom_logo' => 'IdeaSync-Logo.svg',
            'url' => 'ideasync',
            'project_path' => 'idea-sync-BE',
            'public_url' => 'https://ideasync.io',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Ongoing Formation',
            'description' => 'Manage Ongoing Formation for the Diocese',
            'content' => '### Ongoing Formation

Ongoing Formation is an essential app for dioceses to efficiently manage and track important information about their priests. This app helps ensure that everything related to ordination, anniversaries, events, and required studies is organized and communicated effectively.

**Key Features:**

1. **Track Ordinations and Anniversaries:** Easily keep track of the ordination dates and anniversaries of all priests in the diocese. This helps in planning celebrations and acknowledgments.

2. **Event Planning:** Plan and organize events for the presbyterate. Make sure all details are handled, communicated to the speakers, and shared with those who are part of the presbyterate.

3. **Required Studies:** Ensure that all priests are on track with their required studies. This is especially useful for new priests or foreign priests who need to complete specific educational requirements.

4. **Effective Communication:** The app helps in communicating important details to priests and speakers, ensuring that everyone is informed and prepared.

5. **User-Friendly Interface:** Designed to be simple and easy to use, making it accessible for everyone involved, regardless of their technical skills.

With Ongoing Formation, dioceses can manage and support their priests more effectively, ensuring that all important dates, events, and requirements are organized and communicated efficiently. This tool is invaluable for maintaining a well-organized and informed presbyterate.',
            'is_active' => 1,
            'font_awesome' => 'school',
            'custom_logo' => null,
            'url' => 'ongoing-formation',
            'project_path' => 'ongoing-formation',
            'public_url' => 'https://ongoing-formation.catholicresource.org/',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Navigator',
            'description' => 'Organize and share your links with your team',
            'content' => 'Navigator

Navigator is a web application designed to help teams easily organize and share links. In today’s world, where many services and documents are shared across multiple platforms and with multiple people, it can be challenging to keep track of everything. Navigator simplifies this process.

Key Features:

	1.	Organize Links: Easily organize all your important links in one place. This helps you and your team keep track of valuable resources without getting lost.
	2.	Share with Your Team: Share organized links with your team effortlessly. This ensures everyone has access to the same information and resources.
	3.	Centralized Information: Keep all your shared services and documents centralized, making it easy to find and use them whenever needed.
	4.	User-Friendly Interface: The app is designed to be simple and easy to use, making it accessible for everyone, regardless of their technical skills.

With Navigator, you can ensure that all your important links are organized and easily accessible. This tool is perfect for teams looking to manage and share their resources efficiently, providing clarity and ease in navigating shared information.',
            'is_active' => 1,
            'font_awesome' => 'location-arrow',
            'custom_logo' => null,
            'url' => 'navigator',
            'project_path' => 'navigator',
            'public_url' => 'https://navigator.catholicresource.org',
        ]);

        App::create([
            'user_id' => $this->josh->id,
            'name' => 'Wedding and Funeral Readings',
            'description' => 'Select readings for the wedding or for the funeral which are coming up.  Click print, punch holes in the side, and then put the papers in your binder and they will be ready to place on the ambo.',
            'content' => '### Readings App

The Readings App is a simple and efficient tool for selecting readings and readers for weddings and funerals. This app makes it easy to follow the recommendations from the Catholic liturgical ritual documents.

**Key Features:**

1. **Select Readings:** Choose the appropriate readings for weddings and funerals. The app provides the recommended options from the Catholic liturgical ritual documents.

2. **Assign Readers:** Input the names of the readers who will be doing the readings. This ensures everyone knows their role and is prepared.

3. **Print Ready:** Once the readings and readers are selected, simply click "Print." The documents will be ready to put into a binder, making them easy to take to the AMBO.

4. **User-Friendly Interface:** Designed to be straightforward and easy to use, this app ensures that even those with minimal technical skills can manage it effectively.

With the Readings App, you can streamline the process of organizing readings for important ceremonies, ensuring everything is prepared and ready for the service. This tool is an essential addition for pastors, pastoral teams, and anyone involved in planning liturgical events.',
            'is_active' => 1,
            'font_awesome' => 'book',
            'custom_logo' => null,
            'url' => 'readings',
            'project_path' => 'readings',
            'public_url' => 'https://readings.catholicresource.org',
        ]);

    }
}
