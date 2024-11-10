<div x-data="kiosk" id="kiosk">
    <template x-if="($store.kiosk.currentlyPlaying?.mediaType) == 'image'">
        <div class="fixed top-0 bottom-0 left-0 right-0">
            <img :src="$store.kiosk.currentlyPlaying.media[0].url" class="w-full h-full object-cover">
        </div>
    </template>

    <template x-if="($store.kiosk.currentlyPlaying?.mediaType) == 'video'">
        <div class="fixed top-0 bottom-0 left-0 right-0">
            <video width="100%" height="100%" autoplay muted onended="videoEnded()">
                <source :src="$store.kiosk.currentlyPlaying.media[0].url">
                Your browser does not support the video tag.
            </video>
        </div>
    </template>

    <template x-if="($store.kiosk.currentlyPlaying?.mediaType) == 'url'">
        <div class="fixed top-0 bottom-0 left-0 right-0">
            <iframe :src="$store.kiosk.currentlyPlaying.data.url" frameborder="0" class="w-full h-full"></iframe>
        </div>
    </template>
</div>

<script>
    const POOLING_RATE_IN_SECONDS = 30;

    let viewState = {
        scheduleIndex: 0,
        mediaContentIndex: 0,
        schedules: [],
        currentlyPlaying: null,
    };

    document.addEventListener('alpine:init', () => {
        Alpine.store('kiosk', {...viewState})
    })

    document.addEventListener('alpine:init', () => {
        Alpine.data('kiosk', () => ({
            init() {
                fetchSchedules().then((res) => {
                    viewState = {...viewState, schedules: res.data};
                    Alpine.store('kiosk', {...viewState});
                    showNext(0, 0, viewState.schedules)
                });
            }
        }))
    })

    setInterval(() => {
        fetchSchedules().then((res) => {
            viewState = {...viewState, schedules: res.data};
            Alpine.store('kiosk', {...viewState});
        });
    }, POOLING_RATE_IN_SECONDS * 1000)

    function showNext(scheduleIndex, mediaContentIndex, schedules) {
        let media = schedules[scheduleIndex].mediaContents[mediaContentIndex];

        viewState = {...viewState, currentlyPlaying: media};
        Alpine.store('kiosk', {...viewState});

        if (['image', 'url'].includes(media.mediaType.toLowerCase())) {
            setTimeout(() => {
                incrementIndexes();
                showNext(viewState.scheduleIndex, viewState.mediaContentIndex, viewState.schedules);
            }, media.cutoffSeconds * 1000);
        }
    }

    function videoEnded() {
        incrementIndexes();
        showNext(viewState.scheduleIndex, viewState.mediaContentIndex, viewState.schedules);
    }

    function incrementIndexes() {
        const currentScheduleIndex = viewState.scheduleIndex;
        const currentMediaContentIndex = viewState.mediaContentIndex;

        if (currentMediaContentIndex + 1 < viewState.schedules[currentScheduleIndex].mediaContents.length) {
            viewState = {...viewState, mediaContentIndex: currentMediaContentIndex + 1};
        } else {
            if (currentScheduleIndex + 1 < viewState.schedules.length) {
                viewState = {...viewState, scheduleIndex: currentScheduleIndex + 1, mediaContentIndex: 0};
            } else {
                viewState = {...viewState, scheduleIndex: 0, mediaContentIndex: 0};
            }
        }

        Alpine.store('kiosk', {...viewState});
    }

    async function fetchSchedules() {
        let response = await fetch("{{ route('kiosks.schedules', ['id' => $display->id]) }}")
        return await response.json()
    }

</script>
