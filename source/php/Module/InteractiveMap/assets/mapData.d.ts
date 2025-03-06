import { LatLngObject, LatLngBoundsObject } from "@helsingborg-stad/openstreetmap";

type SavedLayerGroup = {
    title: string;
    color: string;
    icon: string;
    layerGroup: string;
    id: string;
};

type SavedMarker = {
    title: string;
    description: string;
    url: string;
    position: LatLngObject;
    layerGroup: string;
};

type SavedImageOverlay = {
    title: string;
    image: string;
    position: LatLngBoundsObject;
    layerGroup: string;
    aspectRatio: number;
};

type SavedStartPosition = LatLngObject|null;

type SaveData = {
    layerGroups: SavedLayerGroup[];
    markers: SavedMarker[];
    imageOverlays: SavedImageOverlay[];
    startPosition: SavedStartPosition;
}
